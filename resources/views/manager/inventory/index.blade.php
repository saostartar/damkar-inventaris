@extends('layouts.staff')

@section('title', 'Manajemen Inventaris')

@section('content')
<div class="container-fluid py-4">
    <!-- Welcome Section -->
    <div class="bg-primary bg-gradient text-white rounded-3 p-4 mb-4">
        <div class="d-flex align-items-center">
            <div class="rounded-circle bg-white p-3 me-3">
                <i class="bi bi-box-seam text-primary fs-3"></i>
            </div>
            <div>
                <h4 class="mb-1">Manajemen Inventaris</h4>
                <p class="mb-0 opacity-75">Kelola dan pantau semua aset dalam satu tampilan</p>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form id="searchForm" class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text border-end-0 bg-white">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" 
                               placeholder="Cari barang...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Semua Kategori</option>
                        <option>Barang Umum</option>
                        <option>Aset Tetap</option>
                        <option>Peralatan & Mesin</option>
                        <option>Tanah</option>
                        <option>Bangunan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Semua Status</option>
                        <option>Tersedia</option>
                        <option>Dipinjam</option>
                        <option>Dalam Perbaikan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="reset" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Inventory Categories -->
    @foreach([
        'barangUmum' => ['Barang Umum', 'primary', 'box-seam'],
        'asetTetap' => ['Aset Tetap', 'success', 'collection'],
        'peralatanMesin' => ['Peralatan & Mesin', 'warning', 'tools'],
        'tanah' => ['Tanah', 'danger', 'geo-alt'],
        'bangunan' => ['Bangunan', 'info', 'building']
    ] as $key => $value)
        @if($data[$key]->count() > 0)
            <div class="card border-0 shadow-sm mb-4 hover-lift">
                <div class="card-header border-0 bg-{{ $value[1] }} bg-gradient text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-{{ $value[2] }} fs-4 me-2"></i>
                        <h5 class="card-title mb-0">{{ $value[0] }}</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3">No. Register</th>
                                    <th>Nama/Tipe</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data[$key] as $item)
                                    <tr>
                                        <td class="ps-3">{{ $item->register }}</td>
                                        <td>
                                            <div class="fw-semibold">{{ $item->nama_barang }}</div>
                                            <small class="text-muted">{{ $item->merk_type ?? '-' }}</small>
                                        </td>
                                        <td>{{ $item->lokasi ?? 'Gudang Utama' }}</td>
                                        <td>
                                            <span class="badge bg-{{ $item->status === 'Tersedia' ? 'success' : 'danger' }} bg-opacity-10 text-{{ $item->status === 'Tersedia' ? 'success' : 'danger' }} px-3 py-2">
                                                <i class="bi bi-circle-fill me-1 small"></i>{{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" 
                                                    class="btn btn-sm btn-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $item->id }}">
                                                <i class="bi bi-info-circle me-1"></i>Detail
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

@push('styles')
<style>
.hover-lift {
    transition: transform 0.2s ease;
}
.hover-lift:hover {
    transform: translateY(-5px);
}
.badge {
    font-weight: 500;
}
.table > :not(caption) > * > * {
    padding: 1rem 0.75rem;
}
.card {
    overflow: hidden;
}
</style>
@endpush
@endsection