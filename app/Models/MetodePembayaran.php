<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'metode_pembayaran_id';

    protected $fillable = [
        'metode_pembayaran_user_id',
        'metode_pembayaran_jenis',
        'metode_pembayaran_nomor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'metode_pembayaran_user_id');
    }
}
