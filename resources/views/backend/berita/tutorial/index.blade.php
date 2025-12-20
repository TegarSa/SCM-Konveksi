@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Video Tutorial</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('tutorial.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Url</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutorials as $tutorial)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $tutorial->title }}</td>
                                        <td>{{ $tutorial->slug }}</td>
                                        <td><iframe width="180" height="105"
                                                src="https://www.youtube.com/embed/{{ $tutorial->url }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe></td>
                                        <td class=""><a class="m-2 btn btn-info"
                                                href="{{ route('tutorial.edit', $tutorial->id) }}">
                                                <i class=" fas fa-solid fa-pen"></i>
                                            </a>

                                            <form action="{{ route('tutorial.destroy', $tutorial->id) }}" method="POST">
                                                @csrf
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
