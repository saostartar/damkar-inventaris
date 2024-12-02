@extends('layouts.main')

@section('title', 'Identitas Logo')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center border-bottom border-danger border-2 pb-3 mb-5">Identitas Logo</h2>

            <div class="text-center mb-5">
                <img src="{{ asset('images/logo2.jpg') }}" alt="Logo Damkar" class="img-fluid mb-4" style="max-height: 200px;">
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="text-danger mb-4">Makna Logo</h5>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">Bentuk Dasar</h6>
                        <p class="text-muted">Logo berbentuk perisai melambangkan perlindungan dan pengamanan terhadap bahaya kebakaran.</p>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">Warna</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger rounded-circle p-2 me-3"></div>
                                    <span class="text-muted">Merah - melambangkan keberanian dan semangat</span>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning rounded-circle p-2 me-3"></div>
                                    <span class="text-muted">Kuning - melambangkan kewaspadaan</span>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="bg-white border rounded-circle p-2 me-3"></div>
                                    <span class="text-muted">Putih - melambangkan kesucian dan ketulusan</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h6 class="fw-bold mb-3">Elemen-elemen</h6>
                        <p class="text-muted mb-2">1. Api dan Air - Melambangkan tugas utama pemadam kebakaran</p>
                        <p class="text-muted mb-2">2. Kapak dan Tali - Melambangkan peralatan utama penyelamatan</p>
                        <p class="text-muted">3. Tulisan Melingkar - Menunjukkan kesatuan dan kekompakan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection