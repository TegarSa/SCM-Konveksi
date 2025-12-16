@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">
        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Tambah Kategori</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('categorypost.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categorypost.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Entry nama kategori" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Keywords</label>
                                <div class="col-sm-10">
                                    <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" placeholder="Entry kata kunci" value="{{ old('keywords') }}">
                                    @error('keywords')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Meta Description</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" placeholder="Entry meta deskripsi" value="{{ old('meta_desc') }}">
                                    @error('meta_desc')
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
