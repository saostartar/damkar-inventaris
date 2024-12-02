<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;

    protected $fillable = [
        'register',
        'kode_barang',
        'nama_barang',
        'kondisi_bangunan',
        'bertingkat',
        'beton',
        'luas_lantai',
        'alamat',
        'tanggal',
        'nomor',
        'luas_m2',
        'status_tanah',
        'nomor_kode_tanah',
        'asal_usul',
        'harga',
        'keterangan'
    ];

    protected $casts = [
        'bertingkat' => 'boolean',
        'beton' => 'boolean',
        'luas_lantai' => 'decimal:2',
        'luas_m2' => 'decimal:2',
        'harga' => 'decimal:2',
        'tanggal' => 'date'
    ];

    public function peminjaman()
    {
        return $this->morphMany(Peminjaman::class, 'borrowable');
    }
}