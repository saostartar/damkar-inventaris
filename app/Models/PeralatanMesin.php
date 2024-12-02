<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeralatanMesin extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'peralatan_mesin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'register',
        'kode_barang',
        'nama_barang',
        'merk_type',
        'ukuran_cc',
        'bahan',
        'pabrik',
        'rangka',
        'mesin',
        'polisi',
        'bpkb',
        'tahun_pengadaan',
        'asal_usul',
        'harga',
        'keterangan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tahun_pengadaan' => 'integer',
        'harga' => 'decimal:2',
    ];

    public function peminjaman()
    {
        return $this->morphMany(Peminjaman::class, 'borrowable');
    }
}