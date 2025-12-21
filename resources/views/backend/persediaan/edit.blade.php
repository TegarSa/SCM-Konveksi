@extends('backend.layouts.index')

@section('title', 'Edit Barang')

@section('content')
<h1>Edit Barang</h1>

<form action="{{ route('persediaan.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" value="{{ $barang->nama_produk }}" required>
    </div>

    <div class="mb-3">
        <label>Jenis Produk</label>
        <input type="text" name="jenis_produk" class="form-control" value="{{ $barang->jenis_produk }}" required>
    </div>

    <div class="mb-3">
        <label>SKU / Kode</label>
        <input type="text" name="sku_kode" class="form-control" value="{{ $barang->sku_kode }}" required>
    </div>

    <div class="mb-3">
        <label>Supplier</label>
        <select name="supplier_id" class="form-control">
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $barang->supplier_id == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->nama_supplier }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Stok Awal</label>
        <input type="number" name="stok_awal" class="form-control" value="{{ $barang->stok_awal }}">
    </div>

    <div class="mb-3">
        <label>Stok Masuk</label>
        <input type="number" name="stok_masuk" class="form-control" value="{{ $barang->stok_masuk }}">
    </div>

    <div class="mb-3">
        <label>Stok Keluar</label>
        <input type="number" name="stok_keluar" class="form-control" value="{{ $barang->stok_keluar }}">
    </div>

    <div class="mb-3">
        <label>Satuan</label>
        <input type="text" name="satuan" class="form-control" value="{{ $barang->satuan }}" required>
    </div>

    <div class="mb-3">
        <label>Harga / Satuan</label>
        <input type="number" name="harga_satuan" class="form-control" value="{{ $barang->harga_satuan }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
