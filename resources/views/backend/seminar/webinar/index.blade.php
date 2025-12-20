@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Webinar</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('training.webinar.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Subjudul</th>
                                    <th>Narasumber</th>
                                    <th>Narasumber 2</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($webinars as $webinar)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $webinar->title }}</td>
                                        <td>{{ $webinar->subtitle }}</td>
                                        <td>{{ $webinar->narasumber->name }}</td>
                                        <td>{{ $webinar->narasumber2->name }}</td>
                                        <td class=""><a class="m-2 btn btn-info"
                                                href="{{ route('training.webinar.edit', $webinar->id) }}">
                                                <i class=" fas fa-solid fa-pen"></i>
                                            </a>
                                            <a class="m-2 btn btn-success"
                                                href="{{ route('training.webinar.detail', $webinar->slug) }}"
                                                target="_blank">
                                                <i class=" fas fa-solid fa-eye"></i>
                                            </a>
                                            <form action="{{ route('training.webinar.destroy', $webinar->id) }}"
                                                method="POST">
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
