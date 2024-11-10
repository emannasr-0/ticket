<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Reviews')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('multiple-action-button'); ?>
    <div class="row justify-content-end">
        <div class="col-auto">
            
            <div class="btn btn-sm btn-primary btn-icon m-1 ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Export Tickets CSV file')); ?>">
                <a href="<?php echo e(route('reviews.export')); ?>" class=""><i class="ti ti-file-export text-white"></i></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table id="pc-dt-simple" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th><?php echo e(__('Ticket ID')); ?></th>
                                    <th class="w-10"><?php echo e(__('Student Name')); ?></th>
                                    <th class="w-10"><?php echo e(__('Student Email')); ?></th>
                                    <th><?php echo e(__('Rating')); ?></th>
                                    <th><?php echo e(__('Comment')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="Id sorting_1">
                                            <a class="btn btn-outline-primary" href="<?php echo e(route('admin.tickets.edit', $review->ticket->id)); ?>">
                                                <?php echo e($review->ticket->ticket_id); ?>

                                            </a>
                                        </td>
                                        <td><span class="white-space"><?php echo e($review->ticket->name); ?></span></td>
                                        <td><span class="white-space"><?php echo e($review->ticket->email); ?></span></td>
                                         <td style="color: #FF9600;; font-size: 20px;">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <span style="margin-right: 2px;"><?php if($i <= $review->rating): ?> &#9733; <?php else: ?> &#9734; <?php endif; ?></span>
                                            <?php endfor; ?>
                                        </td>
                                        <td><span class="white-space"><?php echo e($review->comment); ?></span></td>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/anasacad/support.anasacademy.uk/resources/views/admin/reviews/index.blade.php ENDPATH**/ ?>