@extends('layouts.main')

@section('title', 'Tugas dan Fungsi')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h2 class="border-bottom border-danger border-2 pb-3 mb-4">Tugas dan Fungsi</h2>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title text-danger mb-4">Tugas Pokok</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Mencegah dan menanggulangi kebakaran dalam wilayah Kabupaten Minahasa Utara
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Memberikan pertolongan pada kecelakaan dan bencana
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-danger me-2"></i>
                            Melakukan pembinaan dan penyuluhan kepada masyarakat
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger mb-4">Fungsi</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-shield-check text-danger me-2"></i>
                            Perumusan kebijakan teknis pencegahan dan penanggulangan kebakaran
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-shield-check text-danger me-2"></i>
                            Pelaksanaan operasional pencegahan dan penanggulangan kebakaran
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-shield-check text-danger me-2"></i>
                            Pembinaan dan pengawasan pencegahan kebakaran
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-shield-check text-danger me-2"></i>
                            Koordinasi dengan instansi terkait dalam penanggulangan bencana
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection