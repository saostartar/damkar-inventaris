@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section position-relative mb-5">
        <div class="hero-image position-absolute w-100 h-100"
            style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('{{ asset('images/hero.jpg') }}') no-repeat center center; 
                background-size: cover; 
                min-height: 600px;">
        </div>
        <div class="container position-relative h-100">
            <div class="row min-vh-75 align-items-center py-5">
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="logos d-flex gap-3 justify-content-center justify-content-lg-start">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Pemkab" class="img-fluid"
                            style="max-height: 130px; filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.3));">
                        <img src="{{ asset('images/logo3.png') }}" alt="Logo Damkar" class="img-fluid"
                            style="max-height: 130px; filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.3));">
                    </div>
                </div>
                <div class="col-lg-9 text-center text-lg-start text-white">
                    <h1 class="display-4 fw-bold mb-2" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Dinas Pemadam
                        Kebakaran</h1>
                    <h2 class="h3 mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Kabupaten Minahasa Utara</h2>
                    <p class="lead mb-0" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Melindungi dan Melayani
                        Masyarakat</p>
                </div>
            </div>
        </div>
    </div>

        <!-- Emergency Contact Banner -->
        <div class="bg-danger py-3 mb-5">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto">
                        <div class="d-flex align-items-center text-white">
                            <i class="bi bi-telephone-fill fs-3 me-3"></i>
                            <div>
                                <div class="fw-bold fs-4">Nomor Darurat: 119</div>
                                <div class="small">Siap Melayani 24 Jam</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Statistics Section 2023 -->
    <div class="container mb-5">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-fire text-danger" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-danger mb-2">127</h3>
                        <p class="text-muted mb-0">Kejadian Kebakaran 2023</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-house-check text-danger" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-danger mb-2">45</h3>
                        <p class="text-muted mb-0">Desa Tersosialisasi 2023</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3 d-inline-block mb-3">
                            <i class="bi bi-people text-danger" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-danger mb-2">1,500+</h3>
                        <p class="text-muted mb-0">Masyarakat Teredukasi 2023</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="container mb-5">
        <div class="row align-items-center bg-light rounded-3 p-4 shadow-sm">
            <div class="col-lg-4 text-center mb-4 mb-lg-0">
                <img src="{{ asset('images/logo3.png') }}" alt="Logo Damkar" class="img-fluid mb-4"
                    style="max-width: 200px;">
            </div>
            <div class="col-lg-8">
                <h2 class="border-start border-danger border-4 ps-3 mb-4">Selamat Datang</h2>
                <p class="lead text-secondary mb-4">Selamat datang di website resmi Dinas Pemadam Kebakaran Kabupaten
                    Minahasa Utara. Kami adalah institusi yang berkomitmen untuk memberikan pelayanan terbaik dalam
                    pencegahan dan penanggulangan kebakaran serta penyelamatan.</p>
                <p class="text-muted">Dinas kami dilengkapi dengan peralatan modern dan tim profesional yang siap 24 jam
                    untuk melayani masyarakat Minahasa Utara dalam situasi darurat.</p>
            </div>
        </div>
    </div>

    <!-- Photo Gallery -->
    <div class="container mb-5">
        <h2 class="text-center position-relative mb-5">
            <span class="border-bottom border-danger border-2 pb-2">Galeri Kegiatan</span>
        </h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm hover-shadow transition h-100">
                    <img src="{{ asset('images/activities/activity1.jpg') }}" class="card-img-top" alt="Kegiatan 1"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h5 class="card-title text-danger">Pelatihan Pemadaman</h5>
                        <p class="card-text text-muted small">Pelatihan teknik pemadaman kebakaran bersama masyarakat</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm hover-shadow transition h-100">
                    <img src="{{ asset('images/activities/activity2.jpg') }}" class="card-img-top" alt="Kegiatan 2"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h5 class="card-title text-danger">Sosialisasi Desa</h5>
                        <p class="card-text text-muted small">Program sosialisasi pencegahan kebakaran di desa</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm hover-shadow transition h-100">
                    <img src="{{ asset('images/activities/activity3.jpg') }}" class="card-img-top" alt="Kegiatan 3"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h5 class="card-title text-danger">Simulasi Evakuasi</h5>
                        <p class="card-text text-muted small">Latihan simulasi evakuasi bencana</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        .transition {
            transition: all 0.3s ease;
        }
    </style>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection
