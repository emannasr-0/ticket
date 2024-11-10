

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
                <div class="table-responsive">
                    <table id="pc-dt-simple" class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><?php echo e(__('Name')); ?></th>
                           
                            <th scope="col" class="text-end me-3"><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e(++$index); ?></th>
                                    <td><?php echo e($company->name); ?></td>
                                   
                                    <td class="text-end">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-category')): ?>

                                          
                                        <div class="action-btn bg-info ms-2">
                                            <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" title="<?php echo e(__('Edit')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-url="<?php echo e(route('admin.company.edit', $company->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Company')); ?>" data-size="md"><span class="text-white"><i class="ti ti-edit"></i></span></a>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-category')): ?>
                                        <div class="action-btn bg-danger ms-2">
                                            <form method="POST" action="<?php echo e(route('admin.company.destroy',$company->id)); ?>" id="user-form-<?php echo e($company->id); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm" data-toggle="tooltip"
                                                title="<?php echo e(__('Delete')); ?>">
                                                    <span class="text-white"> <i class="ti ti-trash"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\support\resources\views/admin/company/index.blade.php ENDPATH**/ ?>