<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatAdmin extends Model
{
    use HasFactory;

    protected $table = 'alamat_admin'; // Nama tabel

    protected $primaryKey = 'id_alamatadmin';

    protected $fillable = [
        'admin_id',
        'alamat_lengkap',
        'rt',
        'rw',
        'kelurahan',
        'kabupaten',
        'kecamatan',
        'provinsi',
    ];

    // Definisikan relasi dengan model Lomin jika diperlukan
    public function lomin()
    {
        return $this->belongsTo(Lomin::class, 'admin_id', 'id_admin');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
