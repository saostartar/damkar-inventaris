@extends('layouts.staff')

@section('title', 'Kategori Inventaris')

@section('content')
<div class="container-fluid py-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-dark mb-1">Inventaris</h2>
            <p class="text-muted">Kelola semua aset dan barang dalam satu dashboard</p>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="row g-4">
        <!-- Barang Umum -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-300">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="bi bi-box-seam text-primary fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Barang Umum</h6>
                            <small class="text-muted">Inventaris Reguler</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold text-primary mb-0">{{ number_format($data['barang_umum']) }}</h3>
                            <small class="text-muted">Total Item</small>
                        </div>
                        <a href="{{ route('staff.categories.show', 'barang-umum') }}" 
                           class="btn btn-primary btn-sm d-flex align-items-center">
                            <i class="bi bi-arrow-right-circle me-1"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aset Tetap -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-300">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-buildings text-success fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Aset Tetap</h6>
                            <small class="text-muted">Properti & Bangunan</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold text-success mb-0">{{ number_format($data['aset_tetap']) }}</h3>
                            <small class="text-muted">Total Aset</small>
                        </div>
                        <a href="{{ route('staff.categories.show', 'aset-tetap') }}" 
                           class="btn btn-success btn-sm d-flex align-items-center">
                            <i class="bi bi-arrow-right-circle me-1"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peralatan -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-300">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-tools text-warning fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Peralatan</h6>
                            <small class="text-muted">Mesin & Alat</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold text-warning mb-0">{{ number_format($data['peralatan']) }}</h3>
                            <small class="text-muted">Total Unit</small>
                        </div>
                        <a href="{{ route('staff.categories.show', 'peralatan') }}" 
                           class="btn btn-warning btn-sm d-flex align-items-center">
                            <i class="bi bi-arrow-right-circle me-1"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tanah -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-300">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-geo-alt text-danger fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Tanah</h6>
                            <small class="text-muted">Lahan & Area</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold text-danger mb-0">{{ number_format($data['tanah']) }}</h3>
                            <small class="text-muted">Total Bidang</small>
                        </div>
                        <a href="{{ route('staff.categories.show', 'tanah') }}" 
                           class="btn btn-danger btn-sm d-flex align-items-center">
                            <i class="bi bi-arrow-right-circle me-1"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bangunan -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-300">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-info bg-opacity-10 p-3">
                            <i class="bi bi-building text-info fs-4"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold mb-1">Bangunan</h6>
                            <small class="text-muted">Gedung & Konstruksi</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold text-info mb-0">{{ number_format($data['bangunan']) }}</h3>
                            <small class="text-muted">Total Bangunan</small>
                        </div>
                        <a href="{{ route('staff.categories.show', 'bangunan') }}" 
                           class="btn btn-info btn-sm d-flex align-items-center text-white">
                            <i class="bi bi-arrow-right-circle me-1"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.transition-300 {
    transition: all .3s ease-in-out;
}
</style>
@endsection