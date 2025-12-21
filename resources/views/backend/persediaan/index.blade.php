@extends('backend.layouts.index')

@section('content')

<a href="{{ route('persediaan.create') }}" class="btn btn-primary mb-3">
    + Tambah Barang
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jenis</th>
            <th>SKU</th>
            <th>Supplier</th>
            <th>Stok Awal</th>
            <th>Stok Masuk</th>
            <th>Stok Keluar</th>
            <th>Stok Akhir</th>
            <th>Satuan</th>
            <th>Harga / Satuan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_produk }}</td>
            <td>{{ $item->jenis_produk }}</td>
            <td>{{ $item->sku_kode }}</td>
            <td>{{ $item->supplier->nama_supplier ?? '-' }}</td>
            <td>{{ $item->stok_awal }}</td>
            <td>{{ $item->stok_masuk }}</td>
            <td>{{ $item->stok_keluar }}</td>
            <td>{{ $item->stok_akhir }}</td>
            <td>{{ $item->satuan }}</td>
            <td>Rp {{ number_format($item->harga_satuan) }}</td>
            <td>Rp {{ number_format($item->total_harga) }}</td>
            <td>
                <a href="{{ route('persediaan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
