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
                                <a href="{{ route('narasumber.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('narasumber.update', $narasumber->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $narasumber->name }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Jabaran</label>
                                <div class="col-sm-10">
                                    <input type="text" name="position" value="{{ $narasumber->position }}"
                                        class="form-control @error('position') is-invalid @enderror">
                                    @error('position')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Konsultan</label>
                                <div class="col-sm-10">
                                    <select class="form-select  @error('consultant') is-invalid @enderror"
                                        name="consultant">
                                        <option value="{{ $narasumber->position }}" selected>selected</option>
                                        <option value="team" >Team</option>
                                        <option value="narasumber">Narasumber</option>
                                    </select>
                                    @error('consultant')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" value="{{ $narasumber->image }}"
                                        class="form-control" placeholder="Entry File">
                                    <img class="mt-3 rounded img-fluid" width="200px" height="100px"
                                        src="{{ asset('backend/img/narasumber/' . $narasumber->image) }}" alt="">
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
