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
                <form action="<?php echo e(route('part.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" value="<?php echo e(old('nama')); ?>" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="harga" class="control-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan harga" value="<?php echo e(old('harga')); ?>" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="part_category_id" class="control-label">Kategori</label>
                            <select class="form-select" name="part_category_id" id="part_category_id">
                                <option value=""> -- Pilih Kategori -- </option>
                                <?php $__currentLoopData = $part_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($part_category->id); ?>"><?php echo e($part_category->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/najmulfaiz/Sites/booking-service/resources/views/pages/part/create.blade.php ENDPATH**/ ?>