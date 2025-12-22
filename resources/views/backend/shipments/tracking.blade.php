@extends('backend.layouts.index')

@section('title', 'Shipment Tracking Log')

@section('content')
<div class="container-fluid p-0">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">
            <i class="fas fa-route me-2"></i> Shipment Tracking Log
        </h1>

        <a href="{{ route('shipments.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- Info Shipment --}}
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <strong>No Shipment</strong><br>
                    {{ $shipment->shipment_number }}
                </div>
                <div class="col-md-4">
                    <strong>Tujuan</strong><br>
                    {{ $shipment->destination }}
                </div>
                <div class="col-md-4">
                    <strong>Status Saat Ini</strong><br>
                    @php
                        $badge = [
                            'pending' => 'secondary',
                            'on_delivery' => 'warning',
                            'delivered' => 'success',
                            'canceled' => 'danger'
                        ];
                    @endphp
                    <span class="badge bg-{{ $badge[$shipment->status] }}">
                        {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tracking Log --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table id="trackingTable"
                       class="table table-bordered table-striped table-hover align-middle w-100">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($logs as $log)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <span class="badge bg-{{ $badge[$log->status] }}">
                                    {{ ucfirst(str_replace('_', ' ', $log->status)) }}
                                </span>
                            </td>
                            <td>{{ $log->description ?? '-' }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($log->logged_at)->format('d-m-Y H:i') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                <i class="fas fa-clock fa-lg mb-2"></i><br>
                                Tracking log belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    $('#trackingTable').DataTable({
        pageLength: 10,
        ordering: true,
        responsive: true,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                previous: "‹",
                next: "›"
            }
        }
    });
});
</script>
@endpush
