<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelGambarModel extends Model
{
    use HasFactory;

    protected $table = 'tabel_gambar';

    protected $fillable = [
        'gambar_tentangkami',
        'gambar_dashboard',
    ];
}
