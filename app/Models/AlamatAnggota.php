<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatAnggota extends Model
{
    protected $table = 'alamat_anggota';

    protected $primaryKey = 'id_alamatanggota';

    protected $fillable = [
        'anggota_id',
        'alamat_lengkap',
        'rt',
        'rw',
        'kelurahan',
        'kabupaten',
        'kecamatan',
        'provinsi',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id_anggota');
    }

    public function alamatAnggota()
    {
        return $this->hasOne(AlamatAnggota::class, 'anggota_id', 'id_anggota');
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
