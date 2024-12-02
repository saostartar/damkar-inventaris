@extends('layouts.main')

@section('title', 'Detail Barang')

@section('content')
    <div class="container py-4">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h4 class="card-title mb-4">{{ $item->nama_barang }}</h4>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        @switch($type)
                            @case('barang_umum')
                                <tr>
                                    <td width="35%">Register</td>
                                    <td>: {{ $item->register }}</td>
                                </tr>
                                <tr>
                                    <td>Merk/Type</td>
                                    <td>: {{ $item->merk_type }}</td>
                                </tr>
                                <tr>
                                    <td>Keadaan</td>
                                    <td>: {{ $item->keadaan_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Tersedia</td>
                                    <td>: {{ $item->jumlah_barang }}</td>
                                </tr>
                            @break

                            @case('aset_tetap')
                                <tr>
                                    <td width="35%">Register</td>
                                    <td>: {{ $item->register }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>: {{ $item->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Judul/Pencipta</td>
                                    <td>: {{ $item->judul_pencipta ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Tersedia</td>
                                    <td>: {{ $item->jumlah }}</td>
                                </tr>
                            @break

                            @case('peralatan_mesin')
                                <tr>
                                    <td width="35%">Register</td>
                                    <td>: {{ $item->register }}</td>
                                </tr>
                                <tr>
                                    <td>Merk/Type</td>
                                    <td>: {{ $item->merk_type }}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran CC</td>
                                    <td>: {{ $item->ukuran_cc ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Bahan</td>
                                    <td>: {{ $item->bahan ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>No. Pabrik</td>
                                    <td>: {{ $item->pabrik ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>No. Rangka</td>
                                    <td>: {{ $item->rangka ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>No. Mesin</td>
                                    <td>: {{ $item->mesin ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>No. Polisi</td>
                                    <td>: {{ $item->polisi ?: 'N/A' }}</td>
                                </tr>
                            @break

                            @case('tanah')
                                <tr>
                                    <td width="35%">Register</td>
                                    <td>: {{ $item->register }}</td>
                                </tr>
                                <tr>
                                    <td>Luas (m²)</td>
                                    <td>: {{ $item->luas_m2 }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $item->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Hak</td>
                                    <td>: {{ $item->hak ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>No. Sertifikat</td>
                                    <td>: {{ $item->nomor_sertifikat ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Tgl. Sertifikat</td>
                                    <td>:
                                        {{ $item->tanggal_sertifikat ? date('d/m/Y', strtotime($item->tanggal_sertifikat)) : 'N/A' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Penggunaan</td>
                                    <td>: {{ $item->penggunaan ?: 'N/A' }}</td>
                                </tr>
                            @break

                            @case('bangunan')
                                <tr>
                                    <td width="35%">Register</td>
                                    <td>: {{ $item->register }}</td>
                                </tr>
                                <tr>
                                    <td>Kondisi</td>
                                    <td>: {{ $item->kondisi_bangunan }}</td>
                                </tr>
                                <tr>
                                    <td>Bertingkat</td>
                                    <td>: {{ $item->bertingkat ? 'Ya' : 'Tidak' }}</td>
                                </tr>
                                <tr>
                                    <td>Beton</td>
                                    <td>: {{ $item->beton ? 'Ya' : 'Tidak' }}</td>
                                </tr>
                                <tr>
                                    <td>Luas Lantai (m²)</td>
                                    <td>: {{ $item->luas_lantai }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $item->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Dokumen</td>
                                    <td>: {{ $item->nomor_dokumen ?: 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Dokumen</td>
                                    <td>: {{ $item->tanggal_dokumen ? date('d/m/Y', strtotime($item->tanggal_dokumen)) : 'N/A' }}
                                    </td>
                                </tr>
                            @break
                        @endswitch
                    </table>
                </div>

                <div class="mt-4">
                    @if (isset($item->jumlah_barang) ? $item->jumlah_barang > 0 : true)
                        <a href="{{ route('guest.loans.create', ['itemType' => $type, 'itemId' => $item->id]) }}"
                            class="btn btn-primary">
                            <i class="bi bi-box-arrow-up-right me-1"></i>Pinjam Sekarang
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
