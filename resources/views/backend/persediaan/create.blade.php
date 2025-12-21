@extends('backend.layouts.index')

@section('title', 'Tambah Barang')

@section('content')
<div class="container-fluid p-0">

    <div class="row mb-3">
        <div class="col">
            <h3 class="fw-bold">Tambah Barang</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('persediaan.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Nama Produk --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>

                    {{-- Jenis Produk --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Produk</label>
                        <input type="text" name="jenis_produk" class="form-control" required>
                    </div>

                    {{-- SKU --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">SKU / Kode</label>
                        <input type="text" name="sku_kode" class="form-control" required>
                    </div>

                    {{-- Supplier --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Supplier (Pilih)</label>
                        <select name="supplier_id" class="form-select">
                            <option value="">-- Pilih Supplier --</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">
                                    {{ $supplier->nama_supplier }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">
                            Pilih jika supplier sudah terdaftar
                        </small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Supplier (Input Manual)</label>
                        <input type="text"
                            name="supplier_manual"
                            class="form-control"
                            placeholder="Masukkan nama supplier baru">
                        <small class="text-muted">
                            Isi jika supplier belum ada
                        </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Satuan</label>
                        <input 
                            type="number" 
                            name="harga_satuan" 
                            class="form-control @error('harga_satuan') is-invalid @enderror"
                            value="{{ old('harga_satuan') }}"
                            min="0"
                            step="0.01"
                            required
                        >
                        @error('harga_satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Stok Awal --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Stok Awal</label>
                        <input type="number" name="stok_awal" class="form-control" value="0">
                    </div>

                    {{-- Stok Masuk --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Stok Masuk</label>
                        <input type="number" name="stok_masuk" class="form-control" value="0">
                    </div>

                    {{-- Stok Keluar --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Stok Keluar</label>
                        <input type="number" name="stok_keluar" class="form-control" value="0">
                    </div>

                    {{-- Satuan --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Satuan</label>
                        <input type="text" name="satuan" class="form-control" placeholder="pcs / kg / meter" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('persediaan.index') }}" class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
@endsection
