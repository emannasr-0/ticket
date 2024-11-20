@extends('layouts.admin')

@section('page-title')
    {{ __('Create Ticket') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.tickets.index') }}">{{ __('Tickets') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create') }}</li>
@endsection
@php

$setting = App\Models\Utility::settings();

@endphp
@section('content')
    <form action="{{route('admin.tickets.store')}}" class="mt-3" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header flex-column flex-lg-row  d-flex align-items-lg-center gap-2 justify-content-between">
                        <h6>{{ __('Ticket Information') }}</h6>
                    @if (isset($setting['is_enabled']) && $setting['is_enabled'] == 'on')
                        <a class="btn btn-primary btn-sm float-end ms-2" href="#" data-size="lg" data-ajax-popup-over="true" data-url="{{ route('generate',['support']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate Content with AI') }}"><i class="fas fa-robot"> {{ __('Generate with AI') }}</i></a>

                    @endif
                  </div>

                    <div class="card-body">
                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label class="require form-label" for="company_id">{{ __('Company Name') }}</label>
                                <select class="form-select {{ $errors->has('company_id') ? 'is-invalid' : '' }}" id="company_id" name="company_id" required>
                                    <option value="">{{ __('Select Company') }}</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('company_id') }}
                                </div>
                            </div>
                            
                            <!-- Group Dropdown (Initially hidden) -->
                            <div class="form-group col-md-6" id="group-container" style="display: none;">
                                <label class="require form-label" for="group_id">{{ __('Group Name') }}</label>
                                <select class="form-select {{ $errors->has('group_id') ? 'is-invalid' : '' }}" id="group_id" name="group_id">
                                    <option value="">{{ __('Select Group') }}</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('group_id') }}
                                </div>
                            </div>
                            
                            <!-- User Dropdown (Initially hidden) -->
                            <div class="form-group col-md-6" id="user-container" style="display: none;">
                                <label class="require form-label" for="user_id">{{ __('User Name') }}</label>
                                <select class="form-select {{ $errors->has('user_id') ? 'is-invalid' : '' }}" id="user_id" name="user_id">
                                    <option value="">{{ __('Select User') }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('user_id') }}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="require form-label">{{ __('Name') }}</label>
                                <input class="form-control {{(!empty($errors->first('name')) ? 'is-invalid' : '')}}" type="text" name="name" required="" placeholder="{{ __('Name') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="require form-label">{{ __('Email') }}</label>
                                <input class="form-control {{(!empty($errors->first('email')) ? 'is-invalid' : '')}}" type="email" name="email" required="" placeholder="{{ __('Email') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="form-group col-md-6">
                                <label class="require form-label">{{ __('Category') }}</label>
                                <select class="form-control {{(!empty($errors->first('category')) ? 'is-invalid' : '')}}" name="category" required="">
                                    <option value="">{{ __('Select Category') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label class="require form-label">{{ __('Status') }}</label>
                                <select class="form-control {{(!empty($errors->first('status')) ? 'is-invalid' : '')}}" name="status" required="">
                                    <option value="">{{ __('Select Status') }}</option>
                                    <option value="New Ticket">{{ __('New Ticket') }}</option>
                                    <option value="In Progress">{{ __('In Progress') }}</option>
                                    <option value="On Hold">{{ __('On Hold') }}</option>
                                    <option value="Closed">{{ __('Closed') }}</option>
                                    <option value="Resolved">{{ __('Resolved') }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="require form-label">{{ __('Subject') }}</label>
                                <input class="form-control {{(!empty($errors->first('subject')) ? 'is-invalid' : '')}}" type="text" name="subject" required="" placeholder="{{ __('Subject') }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="require form-label">{{ __('Attachments') }} <small>({{__('You can select multiple files')}})</small> </label>
                                <div class="choose-file form-group">
                                    <label for="file" class="form-label d-block">
                                        {{-- <input type="file" class="form-control {{ $errors->has('attachments') ? ' is-invalid' : '' }}" multiple="" name="attachments[]" id="file" data-filename="multiple_file_selection"> --}}

                                        <input type="file" name="attachments[]" id="file" class="form-control mb-2 {{ $errors->has('attachments') ? ' is-invalid' : '' }}" multiple=""  data-filename="multiple_file_selection" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        <img src="" id="blah" width="20%"/>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('attachments.*') }}
                                        </div>
                                    </label>
                                </div>
                                <p class="multiple_file_selection mx-4"></p>
                            </div>
                            <div class="form-group col-md-6">

                                <label class="require form-label">{{ __('Priority') }}</label>
                                <select class="form-control {{(!empty($errors->first('priority')) ? 'is-invalid' : '')}}" name="priority" required="">
                                    <option value="">{{ __('Select Priority') }}</option>

                                    @foreach($priorities as $priority)

                                        <option value="{{$priority->id}}">{{$priority->name}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('priority') }}
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <label class="require form-label">{{ __('Description') }}</label>
                                <textarea name="description" id="description" class="form-control ckdescription {{(!empty($errors->first('description')) ? 'is-invalid' : '')}}"></textarea>
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            </div>
                            @if(!$customFields->isEmpty())
                                @include('admin.customFields.formBuilder')
                            @endif
                        </div>
                        <div class="d-flex justify-content-end text-end">
                            <a class="btn btn-secondary btn-light btn-submit" href="{{route('admin.tickets.index')}}">{{ __('Cancel') }}</a>
                            <button class="btn btn-primary btn-submit ms-2" type="submit">{{ __('Submit') }}</button>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </form>
@endsection

@push('scripts')
    <script src="//cdn.ckeditor.com/4.12.1/basic/ckeditor.js"></script>
    <script src="{{ asset('js/editorplaceholder.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.each($('.ckdescription'), function (i, editor) {

                CKEDITOR.replace(editor, {
                    // contentsLangDirection: 'rtl',
                    extraPlugins: 'editorplaceholder',
                    editorplaceholder: editor.placeholder
                });
            });
        });
    </script>
    <script>
        document.getElementById('company_id').addEventListener('change', function() {
            var companyId = this.value;
            if(companyId) {
                // Make an AJAX request to fetch the groups
                fetch('/get-groups/' + companyId)
                    .then(response => response.json())
                    .then(data => {
                        var groupDropdown = document.getElementById('group_id');
                        groupDropdown.innerHTML = '<option value="">{{ __('Select Group') }}</option>'; // Clear current options
    
                        if (data.groups.length > 0) {
                            // Populate the group dropdown
                            data.groups.forEach(function(group) {
                                var option = document.createElement('option');
                                option.value = group.id;
                                option.textContent = group.name;
                                groupDropdown.appendChild(option);
                            });
                            document.getElementById('group-container').style.display = 'block'; // Show the group dropdown
                        } else {
                            document.getElementById('group-container').style.display = 'none'; // Hide if no groups
                        }
                    });
            } else {
                document.getElementById('group-container').style.display = 'none'; // Hide if no company selected
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
        const groupSelect = document.getElementById('group_id');
        const userSelect = document.getElementById('user_id');
        const userContainer = document.getElementById('user-container');
    
        groupSelect.addEventListener('change', function () {
            const groupId = groupSelect.value;
    
            if (groupId) {
                // Show the user dropdown container
                userContainer.style.display = 'block';
    
                // Make an AJAX request to fetch users based on the selected group
                fetch(`/group/${groupId}/users`)
                    .then(response => response.json())
                    .then(users => {
                        // Clear existing options
                        userSelect.innerHTML = '<option value="">{{ __("Select User") }}</option>';
    
                        // If users are returned, populate the dropdown
                        if (users.length > 0) {
                            users.forEach(user => {
                                const option = document.createElement('option');
                                option.value = user.id;
                                option.textContent = user.name;
                                userSelect.appendChild(option);
                            });
                        } else {
                            // Handle case where no users are found
                            userSelect.innerHTML = '<option value="">{{ __("No users available") }}</option>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching users:', error);
                        userSelect.innerHTML = '<option value="">{{ __("Error loading users") }}</option>';
                    });
            } else {
                // Hide the user dropdown container if no group is selected
                userContainer.style.display = 'none';
            }
        });
    });
    
    </script>
@endpush

