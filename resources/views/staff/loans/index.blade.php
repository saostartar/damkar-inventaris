@extends('layouts.staff')

@section('title', 'Riwayat Peminjaman')

@section('content')
<div class="container-fluid py-4">
    <!-- Welcome Section -->
    <div class="bg-primary bg-gradient text-white rounded-3 p-4 mb-4">
        <div class="d-flex align-items-center">
            <div class="rounded-circle bg-white p-3 me-3">
                <i class="bi bi-clock-history text-primary fs-3"></i>
            </div>
            <div>
                <h4 class="mb-1">Riwayat Peminjaman</h4>
                <p class="mb-0 opacity-75">Pantau status peminjaman dan pengembalian barang</p>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text border-end-0 bg-white">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Cari peminjam atau barang...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">Semua Status</option>
                        <option>Disetujui</option>
                        <option>Menunggu</option>
                        <option>Kembali</option>
                        <option>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" placeholder="Pilih Tanggal">
                </div>
                <div class="col-md-2">
                    <button type="reset" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Loan History -->
    <div class="card border-0 shadow-sm hover-lift">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3">Peminjam</th>
                            <th>Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $loan)
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light p-2 me-2">
                                            <i class="bi bi-person text-primary"></i>
                                        </div>
                                        {{ $loan->user->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $loan->borrowable->nama_barang }}</div>
                                    <small class="text-muted">{{ $loan->borrowable->register }}</small>
                                </td>
                                <td>{{ $loan->tanggal_pinjam->format('d/m/Y') }}</td>
                                <td>{{ $loan->tanggal_kembali->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ 
                                        $loan->status === 'Disetujui' ? 'success' : 
                                        ($loan->status === 'Menunggu' ? 'warning' : 
                                        ($loan->status === 'Kembali' ? 'info' : 'danger')) 
                                    }} bg-opacity-10 text-{{ 
                                        $loan->status === 'Disetujui' ? 'success' : 
                                        ($loan->status === 'Menunggu' ? 'warning' : 
                                        ($loan->status === 'Kembali' ? 'info' : 'danger')) 
                                    }} px-3 py-2">
                                        <i class="bi bi-{{ 
                                            $loan->status === 'Disetujui' ? 'check-circle' : 
                                            ($loan->status === 'Menunggu' ? 'clock' : 
                                            ($loan->status === 'Kembali' ? 'arrow-return-left' : 'x-circle')) 
                                        }} me-1"></i>
                                        {{ $loan->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#detailModal{{ $loan->id }}">
                                        <i class="bi bi-info-circle me-1"></i>Detail
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-5">
                                        <i class="bi bi-inbox display-1 text-muted mb-3 d-block"></i>
                                        <h5 class="text-muted font-weight-normal">Belum Ada Riwayat Peminjaman</h5>
                                        <p class="text-muted mb-0">Riwayat peminjaman akan muncul di sini</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center p-3 border-top">
                <small class="text-muted">Menampilkan {{ $loans->count() }} dari {{ $loans->total() }} data</small>
                {{ $loans->links() }}
            </div>
        </div>
    </div>
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
</style>
@endpush