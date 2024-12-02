@extends('layouts.manager')

@section('title', 'Dasbor Manager')

@section('content')
    <div class="container-fluid">
        <!-- Loan Statistics Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats bg-success bg-gradient text-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Peminjaman Aktif</h6>
                                <h3 class="mb-0">{{ $activeLoans ?? 0 }}</h3>
                            </div>
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="bi bi-clipboard-check fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats bg-warning bg-gradient text-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Menunggu Persetujuan</h6>
                                <h3 class="mb-0">{{ $pendingRequests ?? 0 }}</h3>
                            </div>
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="bi bi-clock-history fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats bg-info bg-gradient text-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Dikembalikan Hari Ini</h6>
                                <h3 class="mb-0">{{ $returnedToday ?? 0 }}</h3>
                            </div>
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="bi bi-box-arrow-in-left fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm card-stats bg-danger bg-gradient text-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Ditolak</h6>
                                <h3 class="mb-0">{{ $rejectedLoans ?? 0 }}</h3>
                            </div>
                            <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                <i class="bi bi-x-circle fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Loan Requests -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Permintaan Peminjaman Terbaru</h5>
                <a href="{{ route('manager.peminjaman.index') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-list me-1"></i>Lihat Semua
                </a>
            </div>
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
                                <th class="text-end pe-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestLoans ?? [] as $loan)
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-circle text-primary me-2"></i>
                                            {{ $loan->user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $loan->borrowable->nama_barang }}</td>
                                    <td>{{ $loan->tanggal_pinjam->format('d/m/Y') }}</td>
                                    <td>{{ $loan->tanggal_kembali->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $loan->status === 'Disetujui' ? 'success' : 
                                            ($loan->status === 'Menunggu' ? 'warning' : 
                                            ($loan->status === 'Kembali' ? 'info' : 'danger')) 
                                        }}">{{ $loan->status }}</span>
                                    </td>
                                    <td class="text-end pe-3">
                                        <a href="{{ route('manager.peminjaman.show', $loan->id) }}" 
                                           class="btn btn-sm btn-light">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-inbox display-1 text-muted mb-3 d-block"></i>
                                        <p class="text-muted mb-0">Tidak ada permintaan peminjaman terbaru</p>
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