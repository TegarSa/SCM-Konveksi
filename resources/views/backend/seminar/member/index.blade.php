@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">

        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">List Peserta Seminar</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">

                            <div class="col-xl-12 text-end">
                                {{-- <a href="" class="btn btn-danger"><i class="fa-regular fa-file-pdf"></i> Pdf</a> --}}
                                <a href="{{ route('training.member.export') }}" class="btn btn-success"><i
                                        class="fa-regular fa-file-excel"></i> Excel</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Seminar</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Whatsapp</th>
                                    <th>Instansi</th>
                                    <th>Jabatan</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>Tanggal Pendaftaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $member->training->title }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->number }}</td>
                                        <td>{{ $member->institution }}</td>
                                        <td>{{ $member->position }}</td>
                                        <td>{{ $member->province }}</td>
                                        <td>{{ $member->district }}</td>
                                        <td>{{ $member->subdistrict }}</td>
                                        <td>{{ $member->village }}</td>
                                        <td>{{ \Carbon\Carbon::parse($member['created_at'])->isoFormat('D MMMM Y') }}</td>
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
                responsive: true,
            });
        });
    </script>
@endpush
