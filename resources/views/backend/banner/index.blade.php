@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Banner</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('banner.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img class="rounded" width="80px" height="80px"
                                                src="{{ asset('backend/img/banner/' . $banner->image) }}" alt="">
                                        </td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->link }}</td>
                                        <td>
                                            @if ($banner->active == 0)
                                                Show
                                            @else
                                                Hidden
                                            @endif
                                        </td>
                                        <td class=""><a class="m-2 btn btn-info"
                                                href="{{ route('banner.edit', $banner->id) }}">
                                                <i class=" fas fa-solid fa-pen"></i>
                                            </a>

                                            <form action="{{ route('banner.destroy', $banner->id) }}" method="POST">
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
