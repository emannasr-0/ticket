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
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="category" class="form-label" style="float:right;margin-right:0px;"><?php echo e(__($customField->name)); ?></label>
                <select class="form-select" id="category" name="category" data-placeholder="<?php echo e(__($customField->placeholder)); ?>">
                    <option value=""><?php echo e(__($customField->placeholder)); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option id="selcet_<?php echo e($category->id); ?>" value="<?php echo e($category->id); ?>" <?php if(old('category') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback d-block">
                    <?php echo e($errors->first('category')); ?>

                </div>
            </div>
        </div>
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
        <div class="col-lg-12 mb-3">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="student_type" class="form-label" style="float:right;margin-right:0px;">نرجو اختيار صفة التواصل ؟</label><br><br>
                <div class="form-icon-user" style="float:right;margin-right:0px;">
                    <div class="form-check">
                        <input type="radio" class="form-check-input <?php echo e($errors->has('student_type') ? ' is-invalid' : ''); ?>" id="student_type_now" name="student_type" value="now" <?php echo e(old('student_type') == 'now' ? 'checked' : ''); ?> required>
                        <label class="form-check-label" for="student_type_now">متدرب حالي</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input <?php echo e($errors->has('student_type') ? ' is-invalid' : ''); ?>" id="student_type_previous" name="student_type" value="previous" <?php echo e(old('student_type') == 'previous' ? 'checked' : ''); ?> required>
                        <label class="form-check-label" for="student_type_previous">متدرب سابق</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input <?php echo e($errors->has('student_type') ? ' is-invalid' : ''); ?>" id="student_type_public" name="student_type" value="public" <?php echo e(old('student_type') == 'public' ? 'checked' : ''); ?> required>
                        <label class="form-check-label" for="student_type_public">تواصل عام</label>
                    </div>
                    <div class="invalid-feedback d-block">
                        <?php echo e($errors->first('student_type')); ?>

                    </div>
                </div>
            </div>
        </div>



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
<?php /**PATH /home/anasacad/support.anasacademy.uk/resources/views/admin/customFields/formBuilder.blade.php ENDPATH**/ ?>