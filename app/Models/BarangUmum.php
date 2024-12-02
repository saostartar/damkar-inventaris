<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangUmum extends Model
{
    use HasFactory;

    protected $table = 'barang_umum';

    protected $fillable = [
        'register',
        'kode_barang',
        'nama_barang', 
        'merk_type',
        'bahan',
        'ukuran_konstruksi',
        'satuan',
        'keadaan_barang',
        'jumlah_barang',
        'no_sertifikat',
        'no_pabrik',
        'no_chasis',
        'no_mesin',
        'asal_usul',
        'tahun_pengadaan',
        'harga',
        'keterangan'
    ];

    protected $casts = [
        'jumlah_barang' => 'integer',
        'tahun_pengadaan' => 'integer',
        'harga' => 'decimal:2'
    ];

    /**
     * Relasi BarangUmum dengan Peminjaman
     */
    public function peminjaman()
    {
        return $this->morphMany(Peminjaman::class, 'borrowable');
    }
}