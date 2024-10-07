<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table ='bukti_pembayarans';
    protected $primaryKey = 'id_buktipembayaran';
    protected $fillable = [
        'tabungankurs_id',
        'user_id',
        'bukti_transaksi',
        'status',
        'bukti_validasi',
    ];

    public function tabunganInput()
    {
        return $this->belongsTo(TabunganInput::class,'id_tabunganinputs');
    }

    public function tabungankur()
    {
        return $this->belongsTo(Tabungankur::class, 'tabungankurs_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

        public function tabunganInputs()
    {
        return $this->hasMany(TabunganInput::class, 'bukti_pembayaran_id');
    }
}
