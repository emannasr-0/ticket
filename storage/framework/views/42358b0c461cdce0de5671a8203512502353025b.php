

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Category')); ?></li>
<?php $__env->stopSection(); ?>
<?php
    $logos = \App\Models\Utility::get_file('public/');
?>
<?php $__env->startSection('multiple-action-button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-category')): ?>
        

        <div class="float-end">
            <div class="col-auto">
                <a href="<?php echo e(route('admin.company.create')); ?>" class="btn btn-sm btn-primary btn-icon" title="<?php echo e(__('Create')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"  data-title="<?php echo e(__('Create company')); ?>"
                   data-size="md"><i class="ti ti-plus"></i></a>
                   
            </div>
        </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-3">
        <?php echo $__env->make('layouts.setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-body">
               
                <!-- Start Create Company Form (This will show if the button is clicked) -->
                <form method="POST" class="needs-validation" action="<?php echo e(route('admin.company.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <?php if(isset($setting['is_enabled']) && $setting['is_enabled'] == 'on'): ?>
                        <div class="float-end" style="margin-bottom: 15px">
                            <a class="btn btn-primary btn-sm" href="#" data-size="md" data-ajax-popup-over="true" data-url="<?php echo e(route('generate', ['company'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content with AI')); ?>">
                                <i class="fas fa-robot"> <?php echo e(__('Generate with AI')); ?></i>
                            </a>
                        </div>
                        <?php endif; ?>

                        <!-- Company Name Field -->
                        <div class="form-group col-md-6">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" placeholder="<?php echo e(__('Name of the Company')); ?>" name="name"
                                    class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" required>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

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
                                <button class="btn btn-primary btn-block btn-submit"><span><?php echo e(__('Add Company')); ?></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\support\resources\views/admin/company/create.blade.php ENDPATH**/ ?>