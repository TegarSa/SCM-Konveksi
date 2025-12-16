@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Merchandise</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('merch.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Kategory</th>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Harga Diskon</th>
                                    <th>Diskon</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($merchandises as $merchandise)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img class="rounded" width="80px" height="80px"
                                                src="{{ asset('backend/img/merch/' . $merchandise->image) }}"
                                                alt="">
                                        </td>
                                        <td>{{ $merchandise->categoryMerch->name }}</td>
                                        <td>{{ $merchandise->name }}</td>
                                        <td>{{ $merchandise->stock }}</td>
                                        <td>@rupiah($merchandise->price)</td>
                                        <td>@rupiah($merchandise->discount_price)</td>
                                        <td>{{ $merchandise->discount }}</td>
                                        <td>{{ $merchandise->description }}</td>
                                        <td class=""><a class="m-2 btn btn-info"
                                                href="{{ route('merch.edit', $merchandise->id) }}">
                                                <i class=" fas fa-solid fa-pen"></i>
                                            </a>

                                            <form action="{{ route('merch.destroy', $merchandise->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="m-2 btn btn-danger"><i
                                                        class=" fas fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('backend/js/datatables.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endpush
