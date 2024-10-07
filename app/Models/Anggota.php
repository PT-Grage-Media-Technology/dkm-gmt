<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    protected $table = 'anggotas';
    protected $primaryKey = 'id_anggota';
    protected $fillable = [
        'username', 'email', 'password', 'nama_lengkap', 'no_telepon', 'profile_anggota'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function alamatAnggota()
    {
        return $this->hasOne(AlamatAnggota::class, 'anggota_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'anggota_id', 'id_anggota');
    }

}

