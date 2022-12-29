@extends('layouts.master')

@section('title') Tambah Jenis Transmisi @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Master @endslot
        @slot('li_2') Jenis Transmisi @endslot
        @slot('title') Tambah Jenis Transmisi @endslot
    @endcomponent

    <div class="row">
        <div class="col-sm-4 col-xs-12">
            {{-- @include('layouts.alert') --}}

            <div class="card">
                <form action="{{ route('jenis_transmisi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" value="{{ old('nama') }}" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
