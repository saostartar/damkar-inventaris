<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    use HasFactory;

    protected $table = 'tanah';

    protected $fillable = [
        'register',
        'kode_barang',
        'nama_barang',
        'luas_m2',
        'alamat',
        'hak',
        'tanggal_sertifikat',
        'nomor_sertifikat',
        'penggunaan',
        'tahun_pengadaan',
        'asal_usul',
        'harga',
        'keterangan'
    ];

    protected $casts = [
        'luas_m2' => 'decimal:2',
        'harga' => 'decimal:2',
        'tahun_pengadaan' => 'integer',
        'tanggal_sertifikat' => 'date'
    ];

    public function peminjaman()
    {
        return $this->morphMany(Peminjaman::class, 'borrowable');
    }
}