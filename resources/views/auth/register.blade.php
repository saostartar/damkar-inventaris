@extends('layouts.main')

@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3">
                <!-- Card Header -->
                <div class="card-header bg-danger bg-gradient text-white py-3 border-0">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/logo-damkar.png') }}" alt="Logo Damkar" class="img-fluid me-3" style="height: 40px;">
                        <h5 class="mb-0">Daftar Akun</h5>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4">
                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <!-- Hidden Role Input -->
                        <input type="hidden" name="role" value="Guest">

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person-fill text-danger me-1"></i>Nama Lengkap
                            </label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" 
                                   placeholder="Masukkan nama lengkap"
                                   required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope-fill text-danger me-1"></i>Email
                            </label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" 
                                   placeholder="nama@email.com"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock-fill text-danger me-1"></i>Kata Sandi
                            </label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   id="password" name="password" 
                                   placeholder="Minimal 8 karakter"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="bi bi-shield-lock-fill text-danger me-1"></i>Konfirmasi Kata Sandi
                            </label>
                            <input type="password" class="form-control form-control-lg"
                                   id="password_confirmation" name="password_confirmation" 
                                   placeholder="Ulangi kata sandi"
                                   required>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-danger btn-lg px-5 rounded-3 hover-lift">
                                <i class="bi bi-person-plus-fill me-2"></i>Daftar
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-light py-3 text-center border-0">
                    <p class="mb-0">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-danger text-decoration-none">Masuk di sini</a>
                    </p>
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
.form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}
</style>
@endsection