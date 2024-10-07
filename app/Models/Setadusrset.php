<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setadusrset extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'nama',
        'alamat',
    ];

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'setadusrsets';
    
}
