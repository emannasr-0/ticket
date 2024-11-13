<style>
    .form-select {
    background-image: none !important;
        
    }
  #cke_1_contents .cke_wysiwyg_frame html {
   direction:rtl !important;
}
.textareaField{
    text-align:right;
    min-height: calc(10.5em + 1.15rem + 2px) !important;
}
.uploadfield{
    float: right  !important;
    text-align: right !important;
}
.sublabel{
    float: right  !important;
    text-align: right !important;
    font-size:11px;
    padding:10px 0;
}
#selcet_10{
    display:none;
}
#selcet_11{
    display:none;
}
</style>
@if($customFields)
    @foreach($customFields as $customField)
        @if($customField->id == '1')

        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                <label for="company" class="form-label" style="float:right;margin-right:0px;">{{ __('Company Name') }}</label>
                <select class="form-select {{ $errors->has('company_id') ? ' is-invalid' : '' }}" id="company_id" name="company_id" required>
                    <option value="">اختر اسم الشركة</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback d-block">
                    {{ $errors->first('company_id') }}
                </div>
            </div>
        </div>
        
        <!-- Group Dropdown (Initially hidden) -->
        <div class="col-lg-6" id="group-container">
            <div class="form-group mb-3">
                <label for="group_id" class="form-label" style="float:right;margin-right:0px;">اختر الادارة المختصه</label>
                <select class="form-select" id="group_id" name="group_id">
                    <option value="">اختر اسم الادارة</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-lg-6" id="user-container" style="display:none;">
            <div class="form-group mb-3">
                <label for="user_id" class="form-label" style="float:right;margin-right:0px;">اختر المستخدم</label>
                <select class="form-select" id="user_id" name="user_id">
                    <option value="">{{ __('Select User') }}</option>
                </select>
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group mb-3 {{ $customField->width }}">
                    <label for="name" class="form-label" style="float:right;margin-right:0px;">{{ __($customField->name) }}</label>
                    <div class="form-icon-user">
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="{{ __($customField->placeholder) }}" required="" value="{{old('name')}}">
                        <div class="invalid-feedback d-block">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>
            </div>
        @elseif($customField->id == '2')
        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                <label for="email" class="form-label" style="float:right;margin-right:0px;">{{ __($customField->name) }}</label>
                <div class="form-icon-user">
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="{{ __($customField->placeholder) }}" required="" value="{{old('email')}}">
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('email') }}
                    </div>
                </div>
            </div>
        </div>
        @elseif($customField->id == '3')

       
        {{-- <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                <label for="category" class="form-label" style="float:right;margin-right:0px;">{{ __($customField->name) }}</label>
                <select class="form-select" id="category" name="category" data-placeholder="{{ __($customField->placeholder) }}">
                    <option value="">{{ __($customField->placeholder) }}</option>
                    @foreach($categories as $category)
                        <option id="selcet_{{$category->id}}" value="{{$category->id}}" @if(old('category') == $category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback d-block">
                    {{ $errors->first('category') }}
                </div>
            </div>
        </div> --}}
        @elseif($customField->id == '4')
        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                <label for="subject" class="form-label" style="float:right;margin-right:0px;">{{ __($customField->name) }}</label>
                <div class="form-icon-user">
                    <input type="text" class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}" id="subject" name="subject" placeholder="{{ __($customField->placeholder) }}" required="" value="{{old('subject')}}">
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('subject') }}
                    </div>
                </div>
            </div>
        </div>
        
        @elseif($customField->id == '8')
         <br>
        {{-- <div class="col-lg-12 mb-3">
            <div class="form-group mb-3 {{ $customField->width }}">
                <label for="student_type" class="form-label" style="float:right;margin-right:0px;">نرجو اختيار صفة التواصل ؟</label><br><br>
                <div class="form-icon-user" style="float:right;margin-right:0px;">
                    <div class="form-check">
                        <input type="radio" class="form-check-input {{ $errors->has('student_type') ? ' is-invalid' : '' }}" id="student_type_now" name="student_type" value="now" {{ old('student_type') == 'now' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="student_type_now">متدرب حالي</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input {{ $errors->has('student_type') ? ' is-invalid' : '' }}" id="student_type_previous" name="student_type" value="previous" {{ old('student_type') == 'previous' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="student_type_previous">متدرب سابق</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input {{ $errors->has('student_type') ? ' is-invalid' : '' }}" id="student_type_public" name="student_type" value="public" {{ old('student_type') == 'public' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="student_type_public">تواصل عام</label>
                    </div>
                    <div class="invalid-feedback d-block">
                        {{ $errors->first('student_type') }}
                    </div>
                </div>
            </div>
        </div> --}}



        @elseif($customField->id == '5')
        <div class="col-lg-12">
            <div class="form-group mb-3 {{ $customField->width }}" style="text-align:right;">
                <label for="description" class="form-label" style="margin-right:0px;text-align: right;">{{ __('Description') }}</label>
                <textarea name="description" class="form-control textareaField{{ $errors->has('description') ? ' is-invalid' : '' }}"  placeholder="{{ __($customField->placeholder) }}">{{old('description')}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            </div>
        </div>
        @elseif($customField->id == '6')
        <div class="col-lg-6">
            <div class="form-group mb-3  uploadfield {{ $customField->width }}">
                                    <div>
<label class="form-label" style="margin-right:0px;">{{ __($customField->name) }}</label>
                </div>
                <div class="choose-file form-group" style="Float:right">
                    <label for="file" class="form-label">
                        <!--<div>{{ __('Choose File Here') }}</div>-->
                        <!--<div style="text-align:right;margin-right:0px;">اختر الملف هنا</div>-->
                        <input type="file" class="form-control {{ $errors->has('attachments.') ? 'is-invalid' : '' }}" multiple="" name="attachments[]" id="file" data-filename="multiple_file_selection">
                    </label>
                    <div>
                        <small>({{ __($customField->placeholder)}})</small>
                    </div>
                    <p class="multiple_file_selection"></p>
                </div>
            </div>
            <div class="invalid-feedback d-block">
                {{ $errors->first('attachments.*') }}
            </div>
        </div>

        @elseif($customField->custom_id == '7')
        <div class="col-lg-6 ">
            <div class="form-group mb-3 priority-field {{ $customField->width }}">
                <label for="priority" class="form-label" style="float:right;margin-right:0px;">{{ __($customField->name) }}</label>
                <select class="form-select" id="priority" name="priority" data-placeholder="{{ __($customField->placeholder) }}">
                    <option value="">{{ __($customField->placeholder) }}</option>
                    @foreach($priorities as $priority)
                        <option value="{{$priority->id}}" @if(old('priority') == $priority->id) selected @endif>{{$priority->name}}</option>
                    @endforeach
                </select>
                {{-- <small class="sublabel">سيتم مراجعة أهمية طلبك واعتماد أولويته من فريق المساعدة
                
                </small> --}}
                
                
                <!--<label class="form-label" style="float:right;margin-right:0px;"></label>-->
                <div class="invalid-feedback d-block">
                    {{ $errors->first('priority') }}
                </div>
                
            </div>
        </div>
        @elseif($customField->type == 'text')
        <div class="col-lg-6">
            <div class="form-group mb-3{{ $customField->width }}">
                {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label']) }}
                @if($customField->is_required == 1)
                    {{ Form::text('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required']) }}
                @else
                    {{ Form::text('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)]) }}
                @endif
            </div>
        </div>
        @elseif($customField->type == 'email')
        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label']) }}
                @if($customField->is_required == 1)
                    {{ Form::email('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required']) }}
                @else
                    {{ Form::email('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)]) }}
                @endif
            </div>
        </div>
        @elseif($customField->type == 'number')
        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label']) }}
                @if($customField->is_required == 1)
                    {{ Form::number('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required']) }}
                @else
                    {{ Form::number('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)]) }}
                @endif
            </div>
        </div>
        @elseif($customField->type == 'date')
        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label']) }}
                @if($customField->is_required == 1)
                    {{ Form::date('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required']) }}
                @else
                    {{ Form::date('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)]) }}
                @endif
            </div>
        </div>
        @elseif($customField->type == 'radio')
        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label']) }}
                @if($customField->is_required == 1)
                    {{ Form::radio('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required']) }}
                @else
                    {{ Form::radio('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)]) }}
                @endif
            </div>
        </div>
        @elseif($customField->type == 'textarea')
        <div class="col-lg-6">
            <div class="form-group mb-3 {{ $customField->width }}">
                {{ Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label']) }}
                @if($customField->is_required == 1)
                    {{ Form::textarea('customField['.$customField->id.']', null, ['class' => 'form-control ckdescription', 'placeholder' => __($customField->placeholder),'required']) }}
                @else
                    {{ Form::textarea('customField['.$customField->id.']', null, ['class' => 'form-control ckdescription', 'placeholder' => __($customField->placeholder)]) }}
                @endif
            </div>
        </div>
        @endif
    @endforeach
@endif
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