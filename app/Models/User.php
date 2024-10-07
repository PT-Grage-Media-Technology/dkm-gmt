<?php

namespace App\Models;

use App\Models\TabunganInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'no_telepon',
        'tgl_lahir',
        'profile_user',
        'anggota_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // User.php
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id_anggota');
    }

    public function alamatAdmin()
    {
        return $this->hasOne(AlamatAdmin::class, 'admin_id', 'id');
    }

    public function tabunganInputs()
    {
        return $this->hasMany(TabunganInput::class, 'tabungan_kur_id');
    }

    public function tabungankur()
    {
        return $this->hasMany(Tabungankur::class, 'user_id');
    }

    public function alamat()
    {
        return $this->hasOne(Alamat::class, 'id_user');
    }

    public function changePassword($oldPassword, $newPassword)
    {
        // Pastikan password lama sesuai
        if (!Hash::check($oldPassword, $this->password)) {
            return false;
        }

        // Update password baru
        $this->password = Hash::make($newPassword);
        $this->save();

        return true;
    }

    /**
     * untuk menjadikan huruf pertama yang diimputkan akan otomatis menjadi huruf kapital
     *
     * @param  string  $value
     * @return void
     */
    public function setNamaLengkapAttribute($value)
    {
        $this->attributes['nama_lengkap'] = ucwords(strtolower($value));
    }

    /**
     * untuk menjadikan huruf pertama yang diimputkan akan otomatis menjadi huruf kapital
     *
     * @param  string  $value
     * @return void
     */
    // public function setUsernameAttribute($value)
    // {
    //     $this->attributes['username'] = ucfirst(strtolower($value));
    // }


}
