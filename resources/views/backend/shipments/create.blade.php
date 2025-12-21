@extends('backend.layouts.index')
@section('title', 'Tambah Pengiriman')
@section('content')
<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3"><i class="fas fa-truck me-2"></i> Tambah Pengiriman</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('shipments.store') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Pengiriman</label>
                        <input type="date" name="shipment_date" class="form-control" value="{{ old('shipment_date') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tujuan</label>
                        <input type="text" name="destination" class="form-control" value="{{ old('destination') }}" placeholder="Gudang / Toko / Customer" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jenis Stok</label>
                        <select name="inventory_type" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Masuk" {{ old('inventory_type')=='Masuk' ? 'selected':'' }}>Masuk</option>
                            <option value="Keluar" {{ old('inventory_type')=='Keluar' ? 'selected':'' }}>Keluar</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Produk</label>
                        <select name="product_id" class="form-select" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id')==$product->id ? 'selected':'' }}>{{ $product->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" min="1" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kota</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Armada</label>
                        <input type="text" name="armada" class="form-control" value="{{ old('armada') }}" placeholder="Truk / Pick Up / Ekspedisi" required>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
