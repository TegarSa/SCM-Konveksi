@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Dokumen</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            {{-- <div class="col-xl-6">
                                <h5 class="card-title">Horizontal form</h5>
                                <h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6>
                            </div> --}}
                            <div class="col-xl-12 text-end">
                                {{-- <button type="submit" class="btn btn-warning">Kembali</button> --}}
                                <a href="{{ route('document.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>


                        {{-- <div class="text-end">
                            <button type="submit" class="btn btn-primary">back</button>
                        </div> --}}

                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>File</th>
                                    <th>Kategory</th>
                                    <th>Judul</th>
                                    <th>Slug</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><iframe class="rounded" width="80px" height="80px"
                                                src="{{ asset('assets/doc/unduh/' . $document->file) }}"
                                                alt=""></iframe>
                                        </td>
                                        <td>{{ $document->category->name }}</td>
                                        <td>{{ $document->title }}</td>
                                        <td>{{ $document->slug }}</td>
                                        <td class=""><a class="m-2 btn btn-info"
                                                href="{{ route('document.edit', $document->id) }}">
                                                <i class=" fas fa-solid fa-pen"></i>
                                            </a>

                                            <form action="{{ route('document.destroy', $document->id) }}" method="POST">
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
