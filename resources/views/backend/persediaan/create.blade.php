@extends('backend.layouts.index')

@section('title', 'Tambah Barang')

@section('content')
<h1>Tambah Barang</h1>

<form action="{{ route('persediaan.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jenis Produk</label>
        <input type="text" name="jenis_produk" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>SKU / Kode</label>
        <input type="text" name="sku_kode" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Supplier</label>
        <select name="supplier_id" class="form-control">
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Stok Awal</label>
        <input type="number" name="stok_awal" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok Masuk</label>
        <input type="number" name="stok_masuk" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok Keluar</label>
        <input type="number" name="stok_keluar" class="form-control">
    </div>

    <div class="mb-3">
        <label>Satuan</label>
        <input type="text" name="satuan" class=
