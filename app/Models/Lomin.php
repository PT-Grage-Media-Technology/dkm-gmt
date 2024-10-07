<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

// class Lomin extends
class Lomin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table ='lomin';
    protected $primaryKey ='id_admin';
    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'no_telepon',
        'profile_admin',
        'logo',

    ];

    protected $hidden = [
        'password', 'remember_token',
        // 'remember_token',
    ];

    protected $casts =[
        'email_verified_at' =>'detime',
        'password' =>'hashed',
    ];

    public function dataTransaksi()
    {
        return $this->hasMany(DataTransaksi::class, 'admin_id', 'id_admin');
    }

}

