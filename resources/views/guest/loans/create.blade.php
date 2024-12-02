<!-- resources/views/guest/loans/create.blade.php -->
@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Ajukan Peminjaman</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('guest.loans.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_type" value="{{ $itemType }}">
                        <input type="hidden" name="item_id" value="{{ $item->id }}">

                        <!-- Item Details -->
                        <div class="mb-4">
                            <h6>Detail Barang:</h6>
                            <p class="mb-1"><strong>Nama:</strong> {{ $item->nama_barang }}</p>
                            <p class="mb-1"><strong>Register:</strong> {{ $item->register }}</p>
                            @if(property_exists($item, 'merk_type'))
                                <p class="mb-1"><strong>Merk/Type:</strong> {{ $item->merk_type }}</p>
                            @endif
                        </div>

                        <!-- Loan Period -->
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" 
                                   class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                                   name="tanggal_pinjam"
                                   value="{{ old('tanggal_pinjam') }}"
                                   min="{{ date('Y-m-d') }}"
                                   required>
                            @error('tanggal_pinjam')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" 
                                   class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                   name="tanggal_kembali"
                                   value="{{ old('tanggal_kembali') }}"
                                   required>
                            @error('tanggal_kembali')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                      name="keterangan"
                                      rows="3">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection