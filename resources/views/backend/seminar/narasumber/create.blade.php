@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Tambah Data Narasumber Pelatihan</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">

                            <div class="col-xl-12 text-end">
                                <a href="{{ route('training.narasumber.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('training.narasumber.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Entry name">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Profil</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('profile') is-invalid @enderror" name="profile" id="profile" cols="30"
                                        rows="3"></textarea>
                                    @error('profile')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image"
                                        class="form-control  @error('image') is-invalid @enderror"
                                        placeholder="Entry Image">
                                    @error('image')
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
@push('js')
    <script>
        var editor = new FroalaEditor('#profile');
    </script>
@endpush
