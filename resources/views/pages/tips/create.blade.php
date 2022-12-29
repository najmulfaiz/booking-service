@extends('layouts.master')

@section('title') Tambah Tip @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Master @endslot
        @slot('li_2') Tip @endslot
        @slot('title') Tambah Tip @endslot
    @endcomponent

    <div class="row">
        <div class="col-sm-4 col-xs-12">
            {{-- @include('layouts.alert') --}}

            <div class="card">
                <form action="{{ route('tips.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="content" class="control-label">Content</label>
                            <textarea class="form-control" name="content" id="content" placeholder="Masukkan content">{{ old('content') }}</textarea>
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
