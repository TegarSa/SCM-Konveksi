@extends('backend.layouts.index')

@section('title', 'Manajemen Persediaan')

@section('content')
<div class="container-fluid p-0">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">
            <i class="fas fa-boxes me-2"></i> Manajemen Persediaan
        </h1>

        <a href="{{ route('persediaan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Barang
        </a>
    </div>

    {{-- Card --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jenis</th>
                            <th>SKU</th>
                            <th>Supplier</th>
                            <th>Stok Awal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Stok Akhir</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->jenis_produk }}</td>
                            <td>{{ $item->sku_kode }}</td>
                            <td>{{ $item->supplier->nama_supplier ?? '-' }}</td>
                            <td class="text-center">{{ $item->stok_awal }}</td>
                            <td class="text-center">{{ $item->stok_masuk }}</td>
                            <td class="text-center">{{ $item->stok_keluar }}</td>
                            <td class="text-center fw-bold">{{ $item->stok_akhir }}</td>
                            <td class="text-center">{{ $item->satuan }}</td>
                            <td class="text-end">
                                Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                            </td>
                            <td class="text-end fw-semibold">
                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('persediaan.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="text-center text-muted py-4">
                                <i class="fas fa-box-open fa-lg mb-2"></i><br>
                                Data persediaan belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
