@extends('backend.layouts.index')

@section('title', 'Tambah Barang')

@section('content')
<div class="container-fluid p-0">

    {{-- Header --}}
    <div class="mb-3">
        <h1 class="h3">
            <i class="fas fa-boxes me-2"></i> Tambah persediaan
        </h1>
    </div>

    {{-- Card --}}
    <div class="card">
        <div class="card-body">

            <form action="{{ route('persediaan.store') }}" method="POST">
                @csrf

                <div class="row">

                    {{-- Nama Produk --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text"
                                name="nama_produk"
                                class="form-control"
                                value="{{ old('nama_produk') }}"
                                required>
                    </div>

                    {{-- Jenis Produk --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Produk</label>
                        <input type="text"
                                name="jenis_produk"
                                class="form-control"
                                value="{{ old('jenis_produk') }}"
                                required>
                    </div>

                    {{-- SKU --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">SKU / Kode</label>
                        <input type="text"
                                name="sku_kode"
                                class="form-control"
                                value="{{ old('sku_kode') }}"
                                required>
                    </div>

                    {{-- Satuan --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Satuan</label>
                        <input type="text"
                                name="satuan"
                                class="form-control"
                                value="{{ old('satuan') }}"
                                placeholder="pcs / kg / meter"
                                required>
                    </div>

                    {{-- Supplier Pilih --}}
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

                    {{-- Supplier Manual --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Supplier (Manual)</label>
                        <input type="text"
                                name="supplier_manual"
                                class="form-control"
                                value="{{ old('supplier_manual') }}"
                                placeholder="Nama supplier baru">
                        <small class="text-muted">
                            Isi jika supplier belum ada
                        </small>
                    </div>

                    {{-- Harga Satuan --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga Satuan</label>
                        <input type="number"
                                name="harga_satuan"
                                class="form-control @error('harga_satuan') is-invalid @enderror"
                                value="{{ old('harga_satuan') }}"
                                min="0"
                                step="0.01"
                                required>
                        @error('harga_satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Stok Awal --}}
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Stok Awal</label>
                        <input type="number"
                                name="stok_awal"
                                class="form-control"
                                value="{{ old('stok_awal', 0) }}">
                    </div>

                    {{-- Stok Masuk --}}
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Stok Masuk</label>
                        <input type="number"
                                name="stok_masuk"
                                class="form-control"
                                value="{{ old('stok_masuk', 0) }}">
                    </div>

                    {{-- Stok Keluar --}}
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Stok Keluar</label>
                        <input type="number"
                                name="stok_keluar"
                                class="form-control"
                                value="{{ old('stok_keluar', 0) }}">
                    </div>

                </div>

                {{-- Action Button --}}
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('persediaan.index') }}"
                        class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
