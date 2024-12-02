@extends('layouts.staff')

@section('title', 'Ubah Pengguna')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary bg-gradient text-white py-3">
                    <h5 class="card-title mb-0">Ubah Pengguna: {{ $user->name }}</h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('staff.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" 
                                   placeholder="Masukkan nama lengkap"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $user->email) }}" 
                                   placeholder="nama@email.com"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Peran -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Peran</label>
                            <select class="form-select @error('role') is-invalid @enderror" 
                                    id="role" name="role" required>
                                <option value="">Pilih Peran</option>
                                <option value="Staff" {{ (old('role', $user->role) === 'Staff') ? 'selected' : '' }}>Staff</option>
                                <option value="Manager" {{ (old('role', $user->role) === 'Manager') ? 'selected' : '' }}>Manager</option>
                                <option value="Guest" {{ (old('role', $user->role) === 'Guest') ? 'selected' : '' }}>Tamu</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kata Sandi Baru -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi Baru (kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password"
                                   placeholder="Masukkan kata sandi baru">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Kata Sandi Baru -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation"
                                   placeholder="Ulangi kata sandi baru">
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('staff.users.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Perbarui Pengguna
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection