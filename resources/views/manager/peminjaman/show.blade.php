@extends('layouts.manager')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Detail Peminjaman</h5>
                        <span class="badge bg-{{ 
                            $peminjaman->status === 'Disetujui' ? 'success' : 
                            ($peminjaman->status === 'Menunggu' ? 'warning' : 
                            ($peminjaman->status === 'Kembali' ? 'info' : 'danger'))
                        }}">
                            {{ $peminjaman->status }}
                        </span>
                    </div>

                    <div class="row g-4">
                        <!-- Borrower Information -->
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Informasi Peminjam</h6>
                            <p class="mb-1"><strong>Nama:</strong> {{ $peminjaman->user->name }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $peminjaman->user->email }}</p>
                        </div>

                        <!-- Item Information -->
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Informasi Barang</h6>
                            <p class="mb-1"><strong>Nama Barang:</strong> {{ $peminjaman->borrowable->nama_barang }}</p>
                            <p class="mb-1"><strong>Tipe:</strong> {{ class_basename($peminjaman->borrowable_type) }}</p>
                        </div>

                        <div class="col-12">
                            <hr>
                        </div>

                        <!-- Loan Period -->
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Waktu Peminjaman</h6>
                            <p class="mb-1">
                                <strong>Tanggal Pinjam:</strong> 
                                {{ date('d/m/Y', strtotime($peminjaman->tanggal_pinjam)) }}
                            </p>
                            @if($peminjaman->tanggal_kembali)
                                <p class="mb-1">
                                    <strong>Tanggal Kembali:</strong> 
                                    {{ date('d/m/Y', strtotime($peminjaman->tanggal_kembali)) }}
                                </p>
                            @endif
                        </div>

                        <!-- Loan Status History -->
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Status Peminjaman</h6>
                            <p class="mb-1">
                                <strong>Diajukan pada:</strong> 
                                {{ $peminjaman->created_at->format('d/m/Y H:i') }}
                            </p>
                            @if($peminjaman->approved_at)
                                <p class="mb-1">
                                    <strong>Disetujui pada:</strong> 
                                    {{ date('d/m/Y H:i', strtotime($peminjaman->approved_at)) }}
                                </p>
                            @endif
                            @if($peminjaman->rejected_at)
                                <p class="mb-1">
                                    <strong>Ditolak pada:</strong> 
                                    {{ date('d/m/Y H:i', strtotime($peminjaman->rejected_at)) }}
                                </p>
                            @endif
                        </div>

                        @if($peminjaman->keterangan)
                            <div class="col-12">
                                <h6 class="text-muted mb-2">Keterangan</h6>
                                <p class="mb-0">{{ $peminjaman->keterangan }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('manager.peminjaman.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        
                        @if($peminjaman->status === 'Menunggu')
                            <form action="{{ route('manager.peminjaman.approve', $peminjaman->id) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" 
                                        class="btn btn-success"
                                        onclick="return confirm('Setujui peminjaman ini?')">
                                    <i class="bi bi-check-circle me-1"></i>Setujui
                                </button>
                            </form>

                            <form action="{{ route('manager.peminjaman.reject', $peminjaman->id) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" 
                                        class="btn btn-danger"
                                        onclick="return confirm('Tolak peminjaman ini?')">
                                    <i class="bi bi-x-circle me-1"></i>Tolak
                                </button>
                            </form>
                        @endif
                        
                        @if($peminjaman->status === 'Disetujui')
                            <form action="{{ route('manager.peminjaman.return', $peminjaman->id) }}" 
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" 
                                        class="btn btn-primary"
                                        onclick="return confirm('Konfirmasi pengembalian barang?')">
                                    <i class="bi bi-box-arrow-in-left me-1"></i>Konfirmasi Kembali
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection