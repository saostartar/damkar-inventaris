@extends('layouts.main')

@section('title', 'Riwayat Peminjaman')

@section('content')
<div class="container py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Riwayat Peminjaman</h4>
            <p class="text-muted mb-0">Daftar peminjaman barang yang pernah dilakukan</p>
        </div>
        <a href="{{ route('items.index') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Pinjam Barang
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjaman as $pinjam)
                            <tr>
                                <td>{{ $pinjam->borrowable->nama_barang }}</td>
                                <td>{{ $pinjam->tanggal_pinjam->format('d/m/Y') }}</td>
                                <td>{{ $pinjam->tanggal_kembali->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ 
                                        $pinjam->status === 'Disetujui' ? 'success' : 
                                        ($pinjam->status === 'Menunggu' ? 'warning' : 
                                        ($pinjam->status === 'Kembali' ? 'info' : 'danger')) 
                                    }}">
                                        {{ $pinjam->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <i class="bi bi-inbox display-1 text-muted mb-3 d-block"></i>
                                    <p class="text-muted mb-0">Belum ada riwayat peminjaman</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-end mt-3">
                {{ $peminjaman->links() }}
            </div>
        </div>
    </div>
</div>
@endsection