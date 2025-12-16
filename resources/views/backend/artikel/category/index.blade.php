@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Category</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('categorypost.create') }}" class="btn btn-primary">Tambah Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Keywords</th>
                                    <th>Meta Description</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->keywords }}</td>
                                    <td>{{ $category->meta_desc }}</td>
                                    <!-- <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td> -->
                                    <td class="d-column"><a class="m-2 btn btn-info"
                                            href="{{ route('categorypost.edit', $category->id) }}">
                                            <i class=" fas fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route('categorypost.destroy', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
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
