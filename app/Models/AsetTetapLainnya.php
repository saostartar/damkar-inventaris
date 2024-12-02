<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetTetapLainnya extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aset_tetap_lainnya';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'register',
        'kode_barang',
        'nama_barang',
        'judul_pencipta',
        'spesifikasi',
        'asal_daerah',
        'pencipta',
        'bahan',
        'jenis',
        'ukuran',
        'jumlah',
        'tahun_cetak',
        'asal_usul',
        'harga',
        'keterangan'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'jumlah' => 'integer',
        'tahun_cetak' => 'integer',
        'harga' => 'decimal:2'
    ];

    public function peminjaman()
    {
        return $this->morphMany(Peminjaman::class, 'borrowable');
    }
}