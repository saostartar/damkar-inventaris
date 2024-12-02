@extends('layouts.main')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="container py-5">
    <h2 class="text-center border-bottom border-danger border-2 pb-3 mb-5">Struktur Organisasi</h2>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center mb-5">
                        <h4 class="text-danger mb-3">Kepala Dinas</h4>
                        <div class="d-inline-block p-3 border border-danger rounded-circle mb-2">
                            <i class="bi bi-person-fill text-danger" style="font-size: 2rem;"></i>
                        </div>
                        <p class="mb-0 mt-2">[Nama Kepala Dinas]</p>
                    </div>

                    <div class="row g-4 text-center">
                        <!-- Bidang-bidang -->
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3">
                                <h5 class="text-danger mb-3">Bidang Operasional</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2">Seksi Pencegahan</li>
                                    <li class="mb-2">Seksi Pemadam</li>
                                    <li class="mb-2">Seksi Penyelamatan</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3">
                                <h5 class="text-danger mb-3">Bidang Sarana</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2">Seksi Peralatan</li>
                                    <li class="mb-2">Seksi Pemeliharaan</li>
                                    <li class="mb-2">Seksi Logistik</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3">
                                <h5 class="text-danger mb-3">Bidang SDM</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2">Seksi Pelatihan</li>
                                    <li class="mb-2">Seksi Pembinaan</li>
                                    <li class="mb-2">Seksi Administrasi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection