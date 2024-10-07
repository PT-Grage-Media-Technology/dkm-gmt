<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    protected $table = 'metode';

    protected $fillable = ['jenis'];

    public function tabungankur()
    {
        return $this->hasMany(Tabungankur::class);
    }

    public function tabunganinput()
    {
        return $this->hasMany(TabunganInput::class);
    }
}

