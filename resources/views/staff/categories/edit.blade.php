@extends('layouts.staff')

@section('title', 'Edit Item')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary bg-gradient text-white py-3">
                    <h5 class="card-title mb-0">Edit {{ ucfirst(str_replace('-', ' ', $category)) }}</h5>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('staff.categories.update', [$category, $item->id]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Common Fields -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label required">Nomor Register</label>
                                <input type="text" 
                                       class="form-control @error('register') is-invalid @enderror" 
                                       name="register" 
                                       value="{{ old('register', $item->register) }}" 
                                       required>
                                @error('register')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label required">Kode Barang</label>
                                <input type="text" 
                                       class="form-control @error('kode_barang') is-invalid @enderror" 
                                       name="kode_barang" 
                                       value="{{ old('kode_barang', $item->kode_barang) }}" 
                                       required>
                                @error('kode_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label required">Nama Barang</label>
                                <input type="text" 
                                       class="form-control @error('nama_barang') is-invalid @enderror" 
                                       name="nama_barang" 
                                       value="{{ old('nama_barang', $item->nama_barang) }}" 
                                       required>
                                @error('nama_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category Specific Fields -->
                            @include("staff.categories.components.{$category}-form", ['item' => $item])

                            <!-- Common Optional Fields -->
                            <div class="col-md-6">
                                <label class="form-label">Asal Usul</label>
                                <input type="text" 
                                       class="form-control @error('asal_usul') is-invalid @enderror" 
                                       name="asal_usul" 
                                       value="{{ old('asal_usul', $item->asal_usul) }}">
                                @error('asal_usul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tahun Pengadaan</label>
                                <input type="number" 
                                       class="form-control @error('tahun_pengadaan') is-invalid @enderror" 
                                       name="tahun_pengadaan" 
                                       value="{{ old('tahun_pengadaan', $item->tahun_pengadaan) }}"
                                       min="1900" 
                                       max="{{ date('Y') + 1 }}">
                                @error('tahun_pengadaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Harga</label>
                                <input type="number" 
                                       class="form-control @error('harga') is-invalid @enderror" 
                                       name="harga" 
                                       value="{{ old('harga', $item->harga) }}"
                                       step="0.01">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                          name="keterangan" 
                                          rows="2">{{ old('keterangan', $item->keterangan) }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('staff.categories.show', $category) }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-1"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-label.required:after {
    content: "*";
    color: #dc3545;
    margin-left: 4px;
}
</style>
@endsection