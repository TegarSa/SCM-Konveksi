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

                            x <div class="col-xl-12 text-end">
                                <a href="{{ route('bootcamp2.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('bootcamp2.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-sm-2 text-sm-end">Program</label>
                                <div class="col-sm-10">
                                    <input type="text" name="program"
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
                                    <input type="file" name="materi"
                                        class="form-control @error('materi') is-invalid @enderror"
                                        placeholder="Entry Materi">
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
                                    <input type="text" name="formulir"
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
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form row</h5>
                        <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                    placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label" for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" class="m-0 form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <span class="form-check-label">Check me out</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Inline form</h5>
                        <h6 class="card-subtitle text-muted">Single horizontal row.</h6>
                    </div>
                    <div class="card-body">
                        <form class="row row-cols-md-auto align-items-center">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputName2">Name</label>
                                <input type="text" class="mb-2 form-control me-sm-2" id="inlineFormInputName2"
                                    placeholder="Jane Doe">
                            </div>

                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername2">Username</label>
                                <div class="mb-2 input-group me-sm-2">
                                    <div class="input-group-text">@</div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                        placeholder="Username">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 form-check me-sm-2">
                                    <input type="checkbox" class="form-check-input" id="customControlInline">
                                    <label class="form-check-label" for="customControlInline">Remember
                                        me</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="mb-2 btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
@endsection
