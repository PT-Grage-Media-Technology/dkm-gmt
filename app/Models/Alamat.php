<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamat'; // nama tabel
    protected $primaryKey = 'id_alamat';
    protected $fillable = [
        'id_user',
        'alamat_lengkap',
        'rt',
        'rw',
        'kelurahan',
        'kabupaten',
        'kecamatan',
        'provinsi',
    ];

    protected $hidden = [
        'id_user',
    ];
    protected $guarded = ['id_user'];
    protected $casts = [
        'id_user' => 'int',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    //untuk menjadikan huruf pertama yang diimputkan akan otomatis menjadi huruf kapital
    public function setAlamatLengkapAttribute($value)
    {
        $this->attributes['alamat_lengkap'] = ucwords(strtolower($value));
    }

    public function setRtAttribute($value)
    {
        $this->attributes['rt'] = ucwords(strtolower($value));
    }

    public function setRwAttribute($value)
    {
        $this->attributes['rw'] = ucwords(strtolower($value));
    }

    public function setKelurahanAttribute($value)
    {
        $this->attributes['kelurahan'] = ucwords(strtolower($value));
    }

    public function setKabupatenAttribute($value)
    {
        $this->attributes['kabupaten'] = ucwords(strtolower($value));
    }

    public function setKecamatanAttribute($value)
    {
        $this->attributes['kecamatan'] = ucwords(strtolower($value));
    }

    public function setProvinsiAttribute($value)
    {
        $this->attributes['provinsi'] = ucwords(strtolower($value));
    }

    
}