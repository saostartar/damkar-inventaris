<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Explicitly define the table name

    protected $fillable = [
        'user_id',
        'borrowable_id',
        'borrowable_type',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
        'keterangan'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'tanggal_kembali' => 'datetime',
        'tanggal_pinjam' => 'datetime',
    ];

    /**
     * Get the user that owns the loan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the borrowable item (any item category).
     */
    public function borrowable()
    {
        return $this->morphTo();
    }
}