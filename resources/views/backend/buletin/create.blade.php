@extends('backend.layouts.index')

@section('content')
    <div class="p-0 container-fluid">
        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Tambah Buletin</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('backend.buletin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Buletin</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edition" class="form-label">Edisi</label>
                                <input type="text" name="edition" id="edition" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="volume" class="form-label">Volume</label>
                                <input type="text" name="volume" id="volume" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover Buletin</label>
                                <input type="file" name="cover" id="cover" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">File PDF</label>
                                <input type="file" name="file" id="file" class="form-control" accept="application/pdf" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
