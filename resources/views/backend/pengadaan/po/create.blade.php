@extends('backend.layouts.index')

@section('content')
<div class="container-fluid p-0">

    <div class="mb-3">
        <h1 class="align-middle h3 d-inline">Tambah Purchase Order</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-12">
            <div class="card">

                <div class="card-header text-end">
                    <a href="{{ route('po.index') }}" class="btn btn-warning">Kembali</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('po.store') }}" method="POST">
                        @csrf

                        {{-- SUPPLIER --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-sm-end">Supplier</label>
                            <div class="col-sm-10">
                                <select name="supplier_id" class="form-select" required>
                                    <option value="">-- Pilih Supplier --</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">
                                            {{ $supplier->nama_supplier }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- PO DATE --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-sm-end">Tanggal PO</label>
                            <div class="col-sm-10">
                                <input type="date" name="po_date" class="form-control" required>
                            </div>
                        </div>

                        {{-- STATUS --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-sm-end">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-select" required>
                                    <option value="draft">Draft</option>
                                    <option value="approved">Approved</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="completed">Completed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                        </div>

                        <hr>

                        {{-- ITEM --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-sm-end">Barang</label>
                            <div class="col-sm-10">
                                <select name="item_id" class="form-select" required>
                                    <option value="">-- Pilih Barang --</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->item_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- QTY --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-sm-end">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                        </div>

                        {{-- PRICE --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-sm-end">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" class="form-control" required>
                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <div class="mb-3 row">
                            <div class="col-sm-10 ms-sm-auto">
                                <button type="submit" class="btn btn-primary">
                                    Simpan PO
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
