<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoKoAdmin extends Model
{
    use HasFactory;

    protected $table = 'info_ko_admins';

    protected $fillable = [
        'email',      // Tambahkan email jika Anda ingin mengisi kolom ini
        'description',
        'wa',
        'maps',
    ];
}


