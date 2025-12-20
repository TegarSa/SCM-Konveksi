@extends('backend.layouts.index')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.css" rel="stylesheet">
@endpush
@section('content')
    <div class="p-0 container-fluid">
        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Tambah KAK Pelatihan</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('kak.pelatihan.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kak.pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul"
                                        class="form-control @error('judul') is-invalid @enderror"
                                        placeholder="Masukan judul" value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Latar Belakang</label>
                                <div class="col-sm-10">
                                    <textarea name="latar_belakang" id="latar_belakang" class="form-control @error('latar_belakang') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('latar_belakang')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Tujuan</label>
                                <div class="col-sm-10">
                                    <textarea name="tujuan" id="tujuan" class="form-control @error('tujuan') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('tujuan')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Sasaran</label>
                                <div class="col-sm-10">
                                    <textarea name="sasaran" id="sasaran" class="form-control @error('sasaran') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('sasaran')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Metode</label>
                                <div class="col-sm-10">
                                    <textarea name="metode" id="metode" class="form-control @error('metode') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('metode')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Ruang Lingkup</label>
                                <div class="col-sm-10">
                                    <textarea name="ruang_lingkup" id="ruang_lingkup" class="form-control @error('ruang_lingkup') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('ruang_lingkup')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Hasil</label>
                                <div class="col-sm-10">
                                    <textarea name="hasil" id="hasil" class="form-control @error('hasil') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('hasil')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Lokasi</label>
                                <div class="col-sm-10">
                                    <textarea name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('lokasi')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Tim Pelaksana</label>
                                <div class="col-sm-10">
                                    <textarea name="tim_pelaksana" id="tim_pelaksana" class="form-control @error('tim_pelaksana') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('tim_pelaksana')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Fasilitas</label>
                                <div class="col-sm-10">
                                    <textarea name="fasilitas" id="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('fasilitas')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Waktu</label>
                                <div class="col-sm-10">
                                    <textarea name="waktu" id="waktu" class="form-control @error('waktu') is-invalid @enderror"
                                        placeholder="Keterangan"></textarea>
                                    @error('waktu')
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            App.init();
            App.dataTables();
            App.formElements();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#latar_belakang').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#tujuan').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#sasaran').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#metode').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#ruang_lingkup').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#hasil').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#lokasi').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#tim_pelaksana').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#fasilitas').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });

            $('#waktu').summernote({
                height: 300,
                responsive: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname', 'poppins']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Poppins',
                ],
                fontNamesIgnoreCheck: ['Poppins']
            });
        });
    </script>
@endpush
