<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produkhewan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'produkhewan1';
    protected $fillable = [
        'name',
        'price',
        'berat',
        'image',
    ];

    public function tabungankurs()
    {
        return $this->hasMany(Tabungankur::class, 'produk_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
}

