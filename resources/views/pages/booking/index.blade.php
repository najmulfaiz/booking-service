@extends('layouts.master')

@section('title') Booking @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Master @endslot
        @slot('title') Booking @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            {{-- @include('layouts.alert') --}}

            <div class="card">
                <div class="card-body">
                    <a href="{{ route('booking.create') }}" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i class="bx bx-plus label-icon"></i> Tambah</a>
                    <hr />
                    <table id="bookingDatatable" class="table table-striped table-hover table-bordered dt-responsive nowrap w-100 align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nopol</th>
                                <th>Jenis Kendaraan</th>
                                <th>Jenis Service</th>
                                <th>Keluhan</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    var bookingDatatable = $('#bookingDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('booking.index') }}',
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
                data: 'tanggal',
                name: 'tanggal',
                className: 'text-center fit-column',
            },
            {
                data: 'nopol',
                name: 'nopol',
                className: 'text-center fit-column',
            },
            {
                data: 'jenis_kendaraan.nama',
                name: 'jenis_kendaraan.nama',
            },
            {
                data: 'jenis_service.nama',
                name: 'jenis_service.nama',
            },
            {
                data: 'keluhan',
                name: 'keluhan',
            },
            {
                data: 'user.name',
                name: 'user.name',
            },
            {
                data: 'user.name',
                name: 'user.name',
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
                    url: '{{ route('booking.index') }}/' + id,
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

                        bookingDatatable.ajax.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
