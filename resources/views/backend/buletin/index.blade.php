@extends('backend.layouts.index')

@section('content')
    <div class="p-0 container-fluid">
        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Buletin</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('backend.buletin.create') }}" class="btn btn-primary">Tambah Buletin</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>  
                                    <th>Edisi</th>
                                    <th>Volume</th>
                                    <th>Cover</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($buletins as $buletin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $buletin->title }}</td>
                                    <td>{{ $buletin->edition }}</td>
                                    <td>{{ $buletin->volume }}</td>
                                    <td>
                                        <a href="{{ asset($buletin->cover) }}" target="_blank">Lihat Cover </a>
                                    </td>                                    
                                    <td>
                                        <a href="{{ asset($buletin->file) }}" target="_blank">Lihat PDF</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info m-2" href="{{ route('backend.buletin.edit', $buletin->id) }}">
                                            <i class="fas fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('backend.buletin.destroy', $buletin->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-2">
                                                <i class="fas fa-solid fa-trash"></i>
                                            </button>
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
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endpush