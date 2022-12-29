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
                <form action="{{ route('part.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" value="{{ old('nama') }}" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="harga" class="control-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan harga" value="{{ old('harga') }}" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="part_category_id" class="control-label">Kategori</label>
                            <select class="form-select" name="part_category_id" id="part_category_id">
                                <option value=""> -- Pilih Kategori -- </option>
                                @foreach($part_category as $part_category)
                                <option value="{{ $part_category->id }}">{{ $part_category->nama }}</option>
                                @endforeach
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

@endsection
