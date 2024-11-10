@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Category') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Category') }}</li>
@endsection
@php
    $logos = \App\Models\Utility::get_file('public/');
@endphp
@section('multiple-action-button')
    @can('create-category')
        {{-- <div class="btn btn-sm btn-primary btn-icon m-1 float-end">
            <a href="{{route('admin.category.create')}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Create Category') }}"><i class="ti ti-plus text-white"></i></a>
        </div> --}}

        <div class="float-end">
            <div class="col-auto">
                <a href="{{ route('admin.company.create') }}" class="btn btn-sm btn-primary btn-icon" title="{{ __('Create') }}" data-bs-toggle="tooltip" data-bs-placement="top"  data-title="{{ __('Create company') }}"
                   data-size="md"><i class="ti ti-plus"></i></a>
                   {{-- <a href="{{ route('admin.company.create') }}" class="btn btn-primary mb-3">Create New Company</a> --}}
            </div>
        </div>

    @endcan

@endsection

@section('content')
<div class="row">
    <div class="col-3">
        @include('layouts.setup')
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-body">
               
                <!-- Start Create Company Form (This will show if the button is clicked) -->
                <form method="POST" class="needs-validation" action="{{ route('admin.company.store') }}">
                    @csrf
                    <div class="row">
                        @if (isset($setting['is_enabled']) && $setting['is_enabled'] == 'on')
                        <div class="float-end" style="margin-bottom: 15px">
                            <a class="btn btn-primary btn-sm" href="#" data-size="md" data-ajax-popup-over="true" data-url="{{ route('generate', ['company']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate Content with AI') }}">
                                <i class="fas fa-robot"> {{ __('Generate with AI') }}</i>
                            </a>
                        </div>
                        @endif

                        <!-- Company Name Field -->
                        <div class="form-group col-md-6">
                            <label class="form-label">{{ __('Name') }}</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" placeholder="{{ __('Name of the Company') }}" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                        </div>

                        <!-- Company Color Picker Field -->
                  
                    </div>

               

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label"></label>
                            <div class="col-sm-12 col-md-12 text-end">
                                <button class="btn btn-primary btn-block btn-submit"><span>{{ __('Add Company') }}</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

