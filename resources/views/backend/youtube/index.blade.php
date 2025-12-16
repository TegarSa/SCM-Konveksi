@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Youtube</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('youtube.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($youtubes as $youtube)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $youtube->title }}</td>
                                        <td><iframe width="540" height="315" src="{{ $youtube->url }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </td>

                                        <td class=""><a class="m-2 btn btn-info"
                                                href="{{ route('youtube.edit', $youtube->id) }}">
                                                <i class=" fas fa-solid fa-pen"></i>
                                            </a>

                                            <form action="{{ route('youtube.destroy', $youtube->id) }}" method="POST">
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
