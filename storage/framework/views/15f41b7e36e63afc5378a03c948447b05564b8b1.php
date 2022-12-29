<?php $__env->startSection('title'); ?> Tambah Part Category <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Master <?php $__env->endSlot(); ?>
        <?php $__env->slot('li_2'); ?> Part Category <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Tambah Part Category <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-sm-4 col-xs-12">
            

            <div class="card">
                <form action="<?php echo e(route('part_category.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" value="<?php echo e(old('nama')); ?>" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/najmulfaiz/Sites/booking-service/resources/views/pages/part_category/create.blade.php ENDPATH**/ ?>