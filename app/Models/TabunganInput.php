<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TabunganInput extends Model
{
    use HasFactory;
    protected $table = 'tabungan_inputs';
    protected $primaryKey = 'id_tabunganinputs';

    protected $fillable = [
        'user_id',
        'rincian_tanggal_bayar',
        'total_bayar',
        'minus_pembayaran',
        'sisa_bulan',
        'bukti_proses',
        'tabungan_kur_id',
        'bukti_pembayaran_id',
    ];

    protected $dates = ['rincian_tanggal_bayar'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
     // Relasi dengan TabunganKur
    public function tabunganKur()
    {
        return $this->belongsTo(Tabungankur::class, 'tabungan_kur_id');
    }

    public function produk()
    {
        return $this->hasOneThrough(
            ProdukHewan::class,
            Tabungankur::class,
            'id', // Foreign key on TabunganKur table
            'id', // Foreign key on ProdukHewan1 table
            'produk_id', // Local key on TabunganInput table
            'produk_id'  // Local key on TabunganKur table
        );
    }

    public function metode()
    {
        return $this->belongsTo(Metode::class, 'metode_id');
    }

    public function getRincianTanggalBayarFormattedAttribute()
    {
        return $this->rincian_tanggal_bayar->format('d M Y'); // Contoh format: 12 Aug 2024
    }

    // public function updateSisaBulan()
    // {
    //     $this->load('tabunganKur');

    //     $tabunganKur = $this->tabunganKur;
    //     if (!$tabunganKur) {
    //         Log::error("TabunganKur not found for TabunganInput ID: {$this->id}");
    //         return;
    //     }

    //     $jumlahCicilanPerBulan = floatval($tabunganKur->jumlah_cicilan_bulan);
    //     $sisaPembayaran = floatval($this->minus_pembayaran);

    //     Log::info("Update Sisa Bulan - Jml Cicilan/Bulan: {$jumlahCicilanPerBulan}, Sisa Pembayaran: {$sisaPembayaran}");

    //     if ($jumlahCicilanPerBulan > 0) {
    //         $this->sisa_bulan = ceil($sisaPembayaran / $jumlahCicilanPerBulan);
    //         Log::info("Sisa Bulan Diperbarui: {$this->sisa_bulan}");
    //         $this->save();
    //     } else {
    //         Log::warning("Jumlah Cicilan per Bulan adalah 0 atau negatif.");
    //     }
    // }

    public function updatePembayaran($jumlahBayar)
    {
        Log::info("Update Pembayaran - ID: {$this->id}, Jumlah Bayar: {$jumlahBayar}");

        $this->minus_pembayaran += $jumlahBayar;
        Log::info("Minus Pembayaran Setelah Update: {$this->minus_pembayaran}");

        $this->updateSisaBulan();
    }

    public function produkhewan1()
    {
        return $this->belongsTo(produkhewan::class, 'produk_id'); // Sesuaikan dengan nama foreign key yang ada
    }

    public function buktiPembayaran()
    {
        return $this->belongsTo(BuktiPembayaran::class, 'bukti_pembayaran_id');
    }


}
