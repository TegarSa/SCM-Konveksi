@extends('backend.layouts.index')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Tambah Data Webinar</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">

                            <div class="col-xl-12 text-end">
                                <a href="{{ route('training.webinar.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('training.webinar.update', $webinar->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Narasumber 1</label>
                                <div class="col-sm-10">
                                    <select class="form-select  @error('narasumber_id') is-invalid @enderror"
                                        name="narasumber_id">
                                        <option value="{{ $webinar->narasumber->id }}" selected>
                                            {{ $webinar->narasumber->name }}</option>
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
                                <label class="col-form-label col-sm-2 text-sm-end">Narasumber 2</label>
                                <div class="col-sm-10">
                                    <select class="form-select  @error('narasumber2_id') is-invalid @enderror"
                                        name="narasumber2_id">
                                        <option value="{{ $webinar->narasumber2->id }}" selected>
                                            {{ $webinar->narasumber2->name }}</option>
                                        @foreach ($narasumbers2 as $narasumber)
                                            <option value="{{ $narasumber->id }}">{{ $narasumber->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('narasumber2_id')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Logo Webinar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="logo" value="{{ $webinar->logo }}" class="form-control"
                                        placeholder="Maukan logo">
                                    <img class="mt-3 rounded img-fluid" width="200px" height="100px"
                                        src="{{ asset('backend/img/webinar/logo/' . $webinar->logo) }}" alt="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Angkatan Webinar</label>
                                <div class="col-sm-10">
                                    <input type="number" name="angkatan" value="{{ $webinar->angkatan }}"
                                        class="form-control @error('angkatan') is-invalid @enderror"
                                        placeholder="Masukan angkatan webinar">
                                    @error('angkatan')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ $webinar->title }}"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Masukan judul">
                                    @error('title')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Subjudul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="subtitle" value="{{ $webinar->subtitle }}"
                                        class="form-control" placeholder="Masukan subjudul">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Judul Latar Belakang</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul_latarbelakang"
                                        value="{{ $webinar->judul_latarbelakang }}"
                                        class="form-control @error('judul_latarbelakang') is-invalid @enderror"
                                        placeholder="Masukan judul latar belankang">
                                    @error('judul_latarbelakang')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Latar Belakang</label>
                                <div class="col-sm-10">
                                    <input id="latar_belakang"
                                        class="form-control @error('latar_belakang') is-invalid @enderror" type="hidden"
                                        name="latar_belakang">
                                    <trix-editor input="latar_belakang">{!! $webinar->latar_belakang !!}</trix-editor>
                                    @error('latar_belakang')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Benefit</label>
                                <div class="col-sm-10">
                                    <input id="benefit" class="form-control @error('benefit') is-invalid @enderror"
                                        type="hidden" name="benefit">
                                    <trix-editor input="benefit">{!! $webinar->benefit !!}</trix-editor>
                                    @error('benefit')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Materi</label>
                                <div class="col-sm-10">
                                    <input id="materi" class="form-control @error('materi') is-invalid @enderror"
                                        type="hidden" name="materi">
                                    <trix-editor input="materi">{!! $webinar->materi !!}</trix-editor>
                                    @error('materi')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Hari Pelatihan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="hari_pelatihan" value="{{ $webinar->hari_pelatihan }}"
                                        class="form-control @error('hari_pelatihan') is-invalid @enderror"
                                        placeholder="Masukan hari pelatihan">
                                    @error('hari_pelatihan')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Tanggal Pelatihan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tgl_pelatihan" value="{{ $webinar->tgl_pelatihan }}"
                                        class="form-control @error('tgl_pelatihan') is-invalid @enderror"
                                        placeholder="Masukan tanggal pelatihan">
                                    @error('tgl_pelatihan')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Pukul Pelatihan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="waktu_pelatihan" value="{{ $webinar->waktu_pelatihan }}"
                                        class="form-control @error('waktu_pelatihan') is-invalid @enderror"
                                        placeholder="Masukan waktu pelatihan">
                                    @error('waktu_pelatihan')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Poster</label>
                                <div class="col-sm-10">
                                    <input type="file" name="poster" value="{{ $webinar->poster }}"
                                        class="form-control" placeholder="Masukan poster webinar">
                                    <img class="mt-3 rounded img-fluid" width="200px" height="100px"
                                        src="{{ asset('backend/img/webinar/poster/' . $webinar->poster) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Link Pendaftaran</label>
                                <div class="col-sm-10">
                                    <input type="text" name="link_pendaftaran"
                                        value="{{ $webinar->link_pendaftaran }}"
                                        class="form-control @error('link_pendaftaran') is-invalid @enderror"
                                        placeholder="Masukan link pendaftaran">
                                    @error('link_pendaftaran')
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
