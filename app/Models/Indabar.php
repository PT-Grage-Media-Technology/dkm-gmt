<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indabar extends Model
{
    use HasFactory;

    protected $table = 'indabar';

    protected $fillable = [
        'rincian_tanggal_bayar',
        'total_bayar',
        'minus_pembayaran',
    ];
}
