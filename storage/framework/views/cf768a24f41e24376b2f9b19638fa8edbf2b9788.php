<?php $__env->startSection('title'); ?> Jenis Transmisi <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Master <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Jenis Transmisi <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            

            <div class="card">
                <div class="card-body">
                    <a href="<?php echo e(route('jenis_transmisi.create')); ?>" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i class="bx bx-plus label-icon"></i> Tambah</a>
                    <hr />
                    <table id="jenisTransmisiDatatable" class="table table-striped table-hover table-bordered dt-responsive nowrap w-100 align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    var jenisTransmisiDatatable = $('#jenisTransmisiDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?php echo e(route('jenis_transmisi.index')); ?>',
            data: function(d) { }
        },
        columns: [
            {
                data: 'id',
                name: 'id',
                className: 'text-center fit-column',
                render: function ( data, type, full, meta ) {
                    return meta.settings._iDisplayStart + (meta.row + 1);
                }
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'action',
                name: 'action',
                searchable: false,
                className: 'text-center fit-column',
            },
        ]
    });

    $(document).on('click', '.btn_delete', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                var token    = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    url: '<?php echo e(route('jenis_transmisi.index')); ?>/' + id,
                    type: 'post',
                    data: {
                        _token: token,
                        _method: 'DELETE',
                    },
                    dataType: 'json',
                    success: function(res) {
                        if(res.isError) {
                            toastr["error"](res.message);
                        } else {
                            toastr["success"](res.message);
                        }

                        jenisTransmisiDatatable.ajax.reload();
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/najmulfaiz/Sites/booking-service/resources/views/pages/jenis_transmisi/index.blade.php ENDPATH**/ ?>