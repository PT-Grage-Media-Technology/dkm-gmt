<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tabungankur extends Model
{
    use HasFactory;
    protected $table = 'tabungankurs';

    protected $fillable = [
        'awal_waktu_tabungan',
        'target_waktu_tabungan',
        'jumlah_cicilan_bulan',
        'metode_tabungan',
        'user_id',
        'produk_id',
        'status_persetujuan',
        'id_alamat',
        'metode_id',
    ];

    public function metode()
    {
        return $this->belongsTo(Metode::class, 'metode_id');
    }

    public function tabunganInputs()
    {
        return $this->hasMany(TabunganInput::class, 'tabungan_kur_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produk()
    {
        return $this->belongsTo(produkhewan::class, 'produk_id');
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id_alamat');
    }

    public function sisaPembayaran()
    {
        if (!$this->produk) {
            Log::error("Produk not found for Tabungankur ID: {$this->id}");
            return 0;
        }

        $hargaProduk = $this->produk->price;
        $totalPembayaran = $this->tabunganInputs()->sum('total_bayar');

        $sisaPembayaran = $hargaProduk - $totalPembayaran;
        return max($sisaPembayaran, 0);
    }
// In your Tabungankur model
    public function buktiPembayarans()
    {
            return $this->hasMany(BuktiPembayaran::class, 'tabungankurs_id');
    }

    // public function checkIfPaymentInvalid()
    // {
    //     // Logika pengecekan apakah bukti pembayaran tidak valid
    //     if ($this->bukti_pembayaran && $this->bukti_pembayaran->status == 'invalid') {
    //         return true;
    //     }
    //     return false;
    // }

    public function checkIfPaymentInvalid()
    {
        // Logika pengecekan apakah bukti pembayaran tidak valid
        if ($this->buktiPembayarans()->where('status', 'invalid')->exists()) {
            return true;
        }
        return false;
    }

}




