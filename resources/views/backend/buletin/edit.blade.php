@extends('backend.layouts.index')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Buletin</h1>
    <form action="{{ route('backend.buletin.update', $buletin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buletin</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $buletin->title }}" required>
        </div>
        <div class="mb-3">
            <label for="edition" class="form-label">Edisi</label>
            <input type="text" name="edition" id="edition" class="form-control" value="{{ $buletin->edition }}">
        </div>
        <div class="mb-3">
            <label for="volume" class="form-label">Volume</label>
            <input type="text" name="volume" id="volume" class="form-control" value="{{ $buletin->volume }}">
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Cover Buletin</label>
            <input type="file" name="cover" id="cover" class="form-control" accept="image/*">
            <small>Biarkan kosong jika tidak ingin mengganti file.</small>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File PDF</label>
            <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
            <small>Biarkan kosong jika tidak ingin mengganti file.</small>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection