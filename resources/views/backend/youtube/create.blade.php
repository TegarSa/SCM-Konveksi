@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Tambah Data</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">

                            <div class="col-xl-12 text-end">
                                <a href="{{ route('youtube.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('youtube.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Entry Judul">
                                    @error('title')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="url"
                                        class="form-control @error('url') is-invalid @enderror" placeholder="Entry Url">
                                    @error('url')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-10 ms-sm-auto">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
