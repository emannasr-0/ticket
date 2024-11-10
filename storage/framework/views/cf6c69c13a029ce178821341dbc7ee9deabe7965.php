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
<?php if($customFields): ?>
    <?php $__currentLoopData = $customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($customField->id == '1'): ?>

        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="company" class="form-label" style="float:right;margin-right:0px;"><?php echo e(__('Company Name')); ?></label>
                <select class="form-select <?php echo e($errors->has('company_id') ? ' is-invalid' : ''); ?>" id="company_id" name="company_id" required>
                    <option value=""><?php echo e(__('Select Company')); ?></option>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($company->id); ?>" <?php echo e(old('company_id') == $company->id ? 'selected' : ''); ?>><?php echo e($company->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback d-block">
                    <?php echo e($errors->first('company_id')); ?>

                </div>
            </div>
        </div>
        
        <!-- Group Dropdown (Initially hidden) -->
        <div class="col-lg-6" id="group-container">
            <div class="form-group mb-3">
                <label for="group_id" class="form-label" style="float:right;margin-right:0px;">اختر الادارة المختصه</label>
                <select class="form-select" id="group_id" name="group_id">
                    <option value=""><?php echo e(__('Select Group')); ?></option>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        
        <div class="col-lg-6" id="user-container" style="display:none;">
            <div class="form-group mb-3">
                <label for="user_id" class="form-label" style="float:right;margin-right:0px;">اختر المستخدم</label>
                <select class="form-select" id="user_id" name="user_id">
                    <option value=""><?php echo e(__('Select User')); ?></option>
                </select>
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                    <label for="name" class="form-label" style="float:right;margin-right:0px;"><?php echo e(__($customField->name)); ?></label>
                    <div class="form-icon-user">
                        <input type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="name" name="name" placeholder="<?php echo e(__($customField->placeholder)); ?>" required="" value="<?php echo e(old('name')); ?>">
                        <div class="invalid-feedback d-block">
                            <?php echo e($errors->first('name')); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php elseif($customField->id == '2'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="email" class="form-label" style="float:right;margin-right:0px;"><?php echo e(__($customField->name)); ?></label>
                <div class="form-icon-user">
                    <input type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="email" name="email" placeholder="<?php echo e(__($customField->placeholder)); ?>" required="" value="<?php echo e(old('email')); ?>">
                    <div class="invalid-feedback d-block">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                </div>
            </div>
        </div>
        <?php elseif($customField->id == '3'): ?>

       
        
        <?php elseif($customField->id == '4'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="subject" class="form-label" style="float:right;margin-right:0px;"><?php echo e(__($customField->name)); ?></label>
                <div class="form-icon-user">
                    <input type="text" class="form-control <?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" id="subject" name="subject" placeholder="<?php echo e(__($customField->placeholder)); ?>" required="" value="<?php echo e(old('subject')); ?>">
                    <div class="invalid-feedback d-block">
                        <?php echo e($errors->first('subject')); ?>

                    </div>
                </div>
            </div>
        </div>
        
        <?php elseif($customField->id == '8'): ?>
         <br>
        



        <?php elseif($customField->id == '5'): ?>
        <div class="col-lg-12">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>" style="text-align:right;">
                <label for="description" class="form-label" style="margin-right:0px;text-align: right;"><?php echo e(__('Description')); ?></label>
                <textarea name="description" class="form-control textareaField<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>"  placeholder="<?php echo e(__($customField->placeholder)); ?>"><?php echo e(old('description')); ?></textarea>
                <div class="invalid-feedback">
                    <?php echo e($errors->first('description')); ?>

                </div>
            </div>
        </div>
        <?php elseif($customField->id == '6'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3  uploadfield <?php echo e($customField->width); ?>">
                                    <div>
<label class="form-label" style="margin-right:0px;"><?php echo e(__($customField->name)); ?></label>
                </div>
                <div class="choose-file form-group" style="Float:right">
                    <label for="file" class="form-label">
                        <!--<div><?php echo e(__('Choose File Here')); ?></div>-->
                        <!--<div style="text-align:right;margin-right:0px;">اختر الملف هنا</div>-->
                        <input type="file" class="form-control <?php echo e($errors->has('attachments.') ? 'is-invalid' : ''); ?>" multiple="" name="attachments[]" id="file" data-filename="multiple_file_selection">
                    </label>
                    <div>
                        <small>(<?php echo e(__($customField->placeholder)); ?>)</small>
                    </div>
                    <p class="multiple_file_selection"></p>
                </div>
            </div>
            <div class="invalid-feedback d-block">
                <?php echo e($errors->first('attachments.*')); ?>

            </div>
        </div>

        <?php elseif($customField->custom_id == '7'): ?>
        <div class="col-lg-6 ">
            <div class="form-group mb-3 priority-field <?php echo e($customField->width); ?>">
                <label for="priority" class="form-label" style="float:right;margin-right:0px;"><?php echo e(__($customField->name)); ?></label>
                <select class="form-select" id="priority" name="priority" data-placeholder="<?php echo e(__($customField->placeholder)); ?>">
                    <option value=""><?php echo e(__($customField->placeholder)); ?></option>
                    <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($priority->id); ?>" <?php if(old('priority') == $priority->id): ?> selected <?php endif; ?>><?php echo e($priority->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small class="sublabel">سيتم مراجعة أهمية طلبك واعتماد أولويته من فريق المساعدة
                
                </small>
                
                
                <!--<label class="form-label" style="float:right;margin-right:0px;"></label>-->
                <div class="invalid-feedback d-block">
                    <?php echo e($errors->first('priority')); ?>

                </div>
                
            </div>
        </div>
        <?php elseif($customField->type == 'text'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3<?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::text('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::text('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'email'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::email('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::email('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'number'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::number('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::number('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'date'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::date('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::date('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'radio'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::radio('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::radio('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'textarea'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::textarea('customField['.$customField->id.']', null, ['class' => 'form-control ckdescription', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::textarea('customField['.$customField->id.']', null, ['class' => 'form-control ckdescription', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<script>
    document.getElementById('company_id').addEventListener('change', function() {
        var companyId = this.value;
        if(companyId) {
            // Make an AJAX request to fetch the groups
            fetch('/get-groups/' + companyId)
                .then(response => response.json())
                .then(data => {
                    var groupDropdown = document.getElementById('group_id');
                    groupDropdown.innerHTML = '<option value=""><?php echo e(__('Select Group')); ?></option>'; // Clear current options

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
                    userSelect.innerHTML = '<option value=""><?php echo e(__("Select User")); ?></option>';

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
                        userSelect.innerHTML = '<option value=""><?php echo e(__("No users available")); ?></option>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching users:', error);
                    userSelect.innerHTML = '<option value=""><?php echo e(__("Error loading users")); ?></option>';
                });
        } else {
            // Hide the user dropdown container if no group is selected
            userContainer.style.display = 'none';
        }
    });
});

</script><?php /**PATH C:\Users\User\Documents\support\resources\views/admin/customFields/formBuilder.blade.php ENDPATH**/ ?>