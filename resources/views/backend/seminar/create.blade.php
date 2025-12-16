@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Tambah Data Seminar</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">

                            <div class="col-xl-12 text-end">
                                <a href="{{ route('training.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('training.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Narasumber</label>
                                <div class="col-sm-10">
                                    <select class="form-select  @error('narasumber_id') is-invalid @enderror"
                                        name="narasumber_id">
                                        @foreach ($narasumbers as $narasumber)
                                            <option value="{{ $narasumber->id }}">{{ $narasumber->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('narasumber_id')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Entry judul">
                                    @error('title')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Mulai Pendaftaran</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start_register"
                                        class="form-control @error('start_register') is-invalid @enderror start_register"
                                        placeholder="Entry mulai pendaftaran">
                                    @error('start_register')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Akhir Pendaftaran</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end_register"
                                        class="form-control @error('end_register') is-invalid @enderror end_register"
                                        placeholder="Entry akhir pendaftaran">
                                    @error('end_register')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Tanggal Pelatihan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start_training"
                                        class="form-control @error('start_training') is-invalid @enderror start_training"
                                        placeholder="Entry pelatihan">
                                    @error('start_training')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" cols="30"
                                        rows="3"></textarea>
                                    @error('desc')
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
        var editor = new FroalaEditor('#desc');
        flatpickr(".start_register");
        flatpickr(".end_register");
        flatpickr(".start_training");
    </script>
@endpush
