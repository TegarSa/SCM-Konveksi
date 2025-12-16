@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Seminar</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col-xl-12 text-end">
                                <a href="{{ route('training.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Mulai Pendaftaran</th>
                                    <th>Akhir Pendaftaran</th>
                                    <th>Mulai Pelatihan</th>
                                    <th>Narasumber</th>
                                    {{-- <th>Keterangan</th> --}}
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainings as $training)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img class="rounded" width="80px" height="80px"
                                                src="{{ asset('backend/img/seminar/' . $training->image) }}" alt="">
                                        </td>
                                        <td>{{ $training->title }}</td>
                                        <td>{{ $training->start_register }}</td>
                                        <td>{{ $training->end_register }}</td>
                                        <td>{{ $training->start_training }}</td>
                                        <td>{{ $training->narasumber->name }}</td>
                                        {{-- <td>{!! $training->desc !!}</td> --}}
                                        <td class=""><a class="m-2 btn btn-info"
                                                href="{{ route('training.edit', $training->id) }}">
                                                <i class=" fas fa-solid fa-pen"></i>
                                            </a>

                                            <form action="{{ route('training.destroy', $training->id) }}" method="POST">
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
