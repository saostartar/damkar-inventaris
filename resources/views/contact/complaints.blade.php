@extends('layouts.main')

@section('title', 'Form Pengaduan')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page Title -->
            <div class="text-center mb-5">
                <h2 class="position-relative d-inline-block">
                    <span class="border-bottom border-danger border-3 pb-3">Form Pengaduan Masyarakat</span>
                </h2>
                <p class="text-muted mt-3">Silakan isi form di bawah ini untuk menyampaikan pengaduan Anda</p>
            </div>

            <!-- Main Form Card -->
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header bg-danger bg-gradient text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clipboard-data fs-4 me-2"></i>
                        <h5 class="mb-0">Formulir Pengaduan</h5>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('contact.complaints.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person-fill text-danger me-1"></i>Nama Lengkap
                            </label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" 
                                   placeholder="Masukkan nama lengkap Anda" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Email Input -->
                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="bi bi-envelope-fill text-danger me-1"></i>Email
                                </label>
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="nama@email.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone Input -->
                            <div class="col-md-6 mb-4">
                                <label for="phone" class="form-label fw-semibold">
                                    <i class="bi bi-telephone-fill text-danger me-1"></i>Nomor Telepon
                                </label>
                                <input type="tel" class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}" 
                                       placeholder="08xx-xxxx-xxxx" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Subject Input -->
                        <div class="mb-4">
                            <label for="subject" class="form-label fw-semibold">
                                <i class="bi bi-tag-fill text-danger me-1"></i>Subjek Pengaduan
                            </label>
                            <input type="text" class="form-control form-control-lg @error('subject') is-invalid @enderror" 
                                   id="subject" name="subject" value="{{ old('subject') }}" 
                                   placeholder="Ketik subjek pengaduan Anda" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Message Input -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">
                                <i class="bi bi-chat-left-text-fill text-danger me-1"></i>Isi Pengaduan
                            </label>
                            <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="5" 
                                      placeholder="Jelaskan detail pengaduan Anda" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-3 hover-lift">
                                <i class="bi bi-send-fill me-2"></i>Kirim Pengaduan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card border-0 shadow-sm rounded-3 mt-4">
                <div class="card-body p-4">
                    <h5 class="card-title border-start border-danger border-4 ps-3 mb-4">
                        Kontak Kami
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 hover-lift transition">
                                <i class="bi bi-telephone-fill text-danger fs-3 me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Telepon</h6>
                                    <p class="mb-0 text-muted">(0431) 123456</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 hover-lift transition">
                                <i class="bi bi-envelope-fill text-danger fs-3 me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Email</h6>
                                    <p class="mb-0 text-muted">damkar@minahasautara.go.id</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 hover-lift transition">
                                <i class="bi bi-geo-alt-fill text-danger fs-3 me-3"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Alamat</h6>
                                    <p class="mb-0 text-muted">Kompleks Kantor Bupati Minahasa Utara</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-lift {
        transition: all 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-3px);
    }
    .transition {
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }
</style>
@endsection