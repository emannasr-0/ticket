<?php
$setting = App\Models\Utility::settings();
?>
<form method="post" action="<?php echo e(route('admin.company.update', $company->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <?php if(isset($setting['is_enabled']) && $setting['is_enabled'] == 'on'): ?>
        <div class="float-end" style="margin-bottom: 15px">
            <a class="btn btn-primary btn-sm" href="#" data-size="md" data-ajax-popup-over="true" data-url="<?php echo e(route('generate',['company'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content with AI')); ?>"><i class="fas fa-robot"> <?php echo e(__('Generate with AI')); ?></i></a>
        </div>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <label class="form-label"><?php echo e(__('Name')); ?></label>
            <div class="col-sm-12 col-md-12">
                <input type="text" placeholder="<?php echo e(__('Name of the company')); ?>" name="name"
                    class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e($company->name); ?>"
                    autofocus>
                <div class="invalid-feedback">
                    <?php echo e($errors->first('name')); ?>

                </div>
            </div>
        </div>

      
    </div>
  
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label"></label>
            <div class="col-sm-12 col-md-12 text-end">
                <button class="btn btn-primary btn-block btn-submit"><span><?php echo e(__('Update')); ?></span></button>
            </div>
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
<?php /**PATH C:\Users\User\Documents\support\resources\views/admin/company/edit.blade.php ENDPATH**/ ?>