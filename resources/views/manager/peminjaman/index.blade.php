@extends('layouts.manager')

@section('title', 'Manajemen Peminjaman')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body py-4">
                    <h4 class="mb-1">Daftar Peminjaman</h4>
                    <p class="mb-0">Kelola persetujuan dan pengembalian peminjaman barang</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Peminjaman Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>Peminjam</th>
                            <th>Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjaman as $pinjam)
                            <tr>
                                <td>{{ $pinjam->user->name }}</td>
                                <td>{{ $pinjam->borrowable->nama_barang }}</td>
                                <td>{{ date('d/m/Y', strtotime($pinjam->tanggal_pinjam)) }}</td>
                                <td>{{ $pinjam->tanggal_kembali ? date('d/m/Y', strtotime($pinjam->tanggal_kembali)) : '-' }}</td>
                                <td>
                                    @switch($pinjam->status)
                                        @case('Menunggu')
                                            <span class="badge bg-warning">Menunggu</span>
                                            @break
                                        @case('Disetujui')
                                            <span class="badge bg-success">Disetujui</span>
                                            @break
                                        @case('Ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                            @break
                                        @case('Kembali')
                                            <span class="badge bg-info">Dikembalikan</span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="text-end">
                                    @if($pinjam->status === 'Menunggu')
                                        <form action="{{ route('manager.peminjaman.approve', $pinjam->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-success"
                                                    onclick="return confirm('Setujui peminjaman ini?')">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('manager.peminjaman.reject', $pinjam->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Tolak peminjaman ini?')">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    @if($pinjam->status === 'Disetujui')
                                        <form action="{{ route('manager.peminjaman.return', $pinjam->id) }}" 
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-primary"
                                                    onclick="return confirm('Konfirmasi pengembalian barang?')">
                                                <i class="bi bi-box-arrow-in-left"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('manager.peminjaman.show', $pinjam->id) }}" 
                                       class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox display-1 text-muted mb-3 d-block"></i>
                                    <p class="text-muted mb-0">Belum ada data peminjaman</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    {{ $peminjaman->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection