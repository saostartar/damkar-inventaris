@extends('layouts.main')

@section('title', 'Masuk')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3">
                <!-- Card Header -->
                <div class="card-header bg-danger bg-gradient text-white py-3 border-0">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/logo-damkar.png') }}" alt="Logo Damkar" class="img-fluid me-3" style="height: 40px;">
                        <h5 class="mb-0">Masuk</h5>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope-fill text-danger me-1"></i>Alamat Email
                            </label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" 
                                   placeholder="Masukkan alamat email Anda"
                                   required autofocus>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock-fill text-danger me-1"></i>Kata Sandi
                            </label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   id="password" name="password" 
                                   placeholder="Masukkan kata sandi Anda"
                                   required>
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none text-danger">
                                    <i class="bi bi-question-circle-fill me-1"></i>Lupa kata sandi?
                                </a>
                            @endif

                            <button type="submit" class="btn btn-danger btn-lg px-4 hover-lift">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-light py-3 text-center border-0">
                    <p class="mb-0">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-danger text-decoration-none">Daftar di sini</a>
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
.form-check-input:checked {
    background-color: #dc3545;
    border-color: #dc3545;
}
</style>
@endsection