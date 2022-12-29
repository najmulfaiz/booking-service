@extends('layouts.master')

@section('title') Tambah Part Category @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Master @endslot
        @slot('li_2') Part Category @endslot
        @slot('title') Tambah Part Category @endslot
    @endcomponent

    <div class="row">
        <div class="col-sm-4 col-xs-12">
            {{-- @include('layouts.alert') --}}

            <div class="card">
                <form action="{{ route('part_category.store') }}" method="post" enctype="multipart/form-data">
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
