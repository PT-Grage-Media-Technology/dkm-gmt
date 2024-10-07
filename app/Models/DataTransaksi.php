<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi';

    protected $primaryKey = 'id_dataTransaksi';
    // Tentukan kolom-kolom yang dapat diisi massal
    protected $fillable = [
        'no_rekening',
        'no_dana',
        'admin_id',
    ];

    public function lomin()
    {
        return $this->belongsTo(Lomin::class, 'admin_id', 'id_admin');
    }
}
