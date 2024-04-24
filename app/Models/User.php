<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'password',
        'fullname',
        'email',
        'user_nohp',
        'user_alamat',
        'user_profile_url',
        'user_level',
    ];

    public function metodePembayaran()
    {
        return $this->hasMany(MetodePembayaran::class, 'metode_pembayaran_user_id');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'pembelian_user_id');
    }
}
