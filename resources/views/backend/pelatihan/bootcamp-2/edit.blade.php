@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Edit Data</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">

                            <div class="col-xl-12 text-end">
                                <a href="{{ route('bootcamp2.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('bootcamp2.update', $bootcamp->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Program</label>
                                <div class="col-sm-10">
                                    <input type="text" name="program" value="{{ $bootcamp->program }}"
                                        class="form-control @error('program') is-invalid @enderror"
                                        placeholder="Entry Program">
                                    @error('program')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Materi</label>
                                <div class="col-sm-10">
                                    <input type="file" name="materi" value="{{ $bootcamp->materi }}"
                                        class="form-control @error('materi') is-invalid @enderror"
                                        placeholder="Entry Materi">
                                    @empty($bootcamp->materi)
                                    @else
                                        <iframe class="mt-3 rounded img-fluid" width="200px" height="100px"
                                            src="{{ asset('assets/doc/materi/' . $bootcamp->materi) }}" alt=""></iframe>
                                    @endempty
                                    @error('materi')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Formulir</label>
                                <div class="col-sm-10">
                                    <input type="text" name="formulir" value="{{ $bootcamp->formulir }}"
                                        class="form-control @error('formulir') is-invalid @enderror"
                                        placeholder="Entry Formulir">
                                    @error('formulir')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-10 ms-sm-auto">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
