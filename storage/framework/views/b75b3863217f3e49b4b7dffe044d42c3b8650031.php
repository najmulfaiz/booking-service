<?php $__env->startSection('title'); ?> Tambah Tip <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Master <?php $__env->endSlot(); ?>
        <?php $__env->slot('li_2'); ?> Tip <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Tambah Tip <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-sm-4 col-xs-12">
            

            <div class="card">
                <form action="<?php echo e(route('tips.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan title" value="<?php echo e(old('title')); ?>" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="content" class="control-label">Content</label>
                            <textarea class="form-control" name="content" id="content" placeholder="Masukkan content"><?php echo e(old('content')); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image"  />
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/najmulfaiz/Sites/booking-service/resources/views/pages/tips/create.blade.php ENDPATH**/ ?>