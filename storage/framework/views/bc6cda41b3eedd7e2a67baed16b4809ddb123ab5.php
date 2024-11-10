
<form method="post" action="<?php echo e(route('admin.groups.update', $groups->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">


        <div class="col-6 form-group">
            <label class="col-form-label" for="company_id"><?php echo e(__('Company')); ?></label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value=""><?php echo e(__('Select Company')); ?></option>
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($company->id); ?>" <?php echo e($groups->company_id == $company->id ? 'selected' : ''); ?>>
                        <?php echo e($company->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('company_id')): ?>
                <div class="invalid-feedback">
                    <?php echo e($errors->first('company_id')); ?>

                </div>
            <?php endif; ?>
        </div>

        <div class="col-6 form-group">
            <label class="col-form-label" for="name"><?php echo e(__('Group Name')); ?></label>
            <input type="text" class="form-control" id="name" value="<?php echo e($groups->name); ?>" name="name" required />
        </div>

        <div class="col-6 form-group">
            <label class="require form-label"><?php echo e(__('Description')); ?></label>
            <textarea name="description" class="form-control ckdescription" value="<?php echo e($groups->description); ?>"></textarea>
        </div>
        <div class="col-6 form-group">
            <?php echo e(Form::label('operating_hours', __('Operating Hours'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::select('operating_hours', $opeatings,null, array('class' => 'form-control select','required'=>'required'))); ?>


        </div>
        <div class="col-6 form-group">
            <?php echo e(Form::label('users', __('Agent'), ['class' => 'col-form-label'])); ?>


            <?php echo e(Form::select('users[]', $users, explode(',', $groups->users), ['class' => 'form-control multi-select ', 'id' => 'choices-multiple1', 'multiple' => ''])); ?>


        </div>

        <div class="col-6 form-group">
            <?php echo e(Form::label('leader', __('Group leader'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('leader[]', $leader, explode(',', $groups->leader), ['class' => 'form-control multi-select ', 'id' => 'choices-multiple2', 'multiple' => ''])); ?>

        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="email"><?php echo e(__('E-Mail Address')); ?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($groups->email); ?>" />
        </div>
    </div>
    <div class="row">
        <div class="d-flex justify-content-end text-end">
            <a class="btn btn-secondary btn-light btn-submit" href="<?php echo e(route('admin.group')); ?>"><?php echo e(__('Cancel')); ?></a>
            <button class="btn btn-primary btn-submit ms-2" type="submit"><?php echo e(__('Add')); ?></button>
        </div>
    </div>
</form>

<script src="<?php echo e(asset('public/libs/select2/dist/js/select2.min.js')); ?>"></script>

<script>
    if ($(".multi-select").length > 0) {
    $( $(".multi-select") ).each(function( index,element ) {
        var id = $(element).attr('id');
           var multipleCancelButton = new Choices(
                '#'+id, {
                    removeItemButton: true,
                }
            );
    });

}


if ($(".select2").length) {
        $('.select2').select2({
            "language": {
                "noResults": function () {
                    return "No result found";
                }
            },
        });
    }

</script>


<?php /**PATH C:\Users\User\Documents\support\resources\views/admin/groups/edit.blade.php ENDPATH**/ ?>