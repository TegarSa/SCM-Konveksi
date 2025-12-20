@extends('backend.layouts.index')
@section('content')
    <div class="p-0 container-fluid">
        <div class="mb-3">
            <h1 class="align-middle h3 d-inline">Download Records</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Document Title</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Institution</th>
                                    <th>Downloaded At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $record->document_title }}</td>
                                        <td>{{ $record->user_name }}</td>
                                        <td>{{ $record->user_email }}</td>
                                        <td>{{ $record->user_phone }}</td>
                                        <td>{{ $record->user_institution }}</td>
                                        <td>{{ \Carbon\Carbon::parse($record->downloaded_at)->format('Y-m-d H:i:s') }}</td>
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