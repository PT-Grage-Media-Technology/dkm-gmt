<?php

namespace App\Http\Controllers\Anggota;

use App\Models\User;
use App\Models\Metode;
use App\Models\Produkhewan;
use App\Models\Tabungankur;
use App\Models\Produkhewan1;
use Illuminate\Http\Request;
use App\Models\TabunganInput;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoriTabunganController extends Controller
{


    // public function index()
    // {
    //     $anggotaId = Auth::guard('anggota')->id();

    //     // Mendapatkan tabungan kurs yang disetujui
    //     $approvedTabunganKurs = Tabungankur::where('status_persetujuan', 'Disetujui')
    //         ->whereHas('user', function ($query) use ($anggotaId) {
    //             $query->where('anggota_id', $anggotaId);
    //         })
    //         ->get();

    //     // Mendapatkan data pengguna yang terkait
    //     $users = User::where('anggota_id', $anggotaId)->get();

    //     // Mendapatkan histori tabungan termasuk bukti pembayaran
    //         $historiTabungan = TabunganInput::with(['user', 'tabunganKur.produk', 'tabunganKur.metode', 'buktiPembayaran'])
    //             ->whereHas('tabunganKur', function ($query) use ($anggotaId) {
    //                 $query->where('status_persetujuan', 'Disetujui')
    //                     ->whereHas('user', function ($query) use ($anggotaId) {
    //                         $query->where('anggota_id', $anggotaId);
    //                     });
    //             })
    //             ->get();

    //     // Mendapatkan daftar produk dan metode
    //     $uniqueProduk = Produkhewan::all();
    //     $metodeList = Metode::all();

    //     return view('anggota.inputuser.historitabungan', compact('historiTabungan', 'users', 'uniqueProduk', 'metodeList'));
    // }

    public function index()
    {
        $anggotaId = Auth::guard('anggota')->id();

        // Mendapatkan tabungan kurs yang disetujui
        $approvedTabunganKurs = Tabungankur::where('status_persetujuan', 'Disetujui')
            ->whereHas('user', function ($query) use ($anggotaId) {
                $query->where('anggota_id', $anggotaId);
            })
            ->get();

        // Mendapatkan data pengguna yang terkait
        $users = User::where('anggota_id', $anggotaId)->get();

        // Mendapatkan histori tabungan termasuk bukti pembayaran
        $historiTabungan = TabunganInput::with(['user', 'tabunganKur.produk', 'tabunganKur.metode', 'buktiPembayaran'])
            ->whereHas('tabunganKur', function ($query) use ($anggotaId) {
                $query->where('status_persetujuan', 'Disetujui')
                    ->whereHas('user', function ($query) use ($anggotaId) {
                        $query->where('anggota_id', $anggotaId);
                    });
            })
            ->get();

        // Mendapatkan daftar produk dan metode
        $uniqueProduk = Produkhewan::all();
        $metodeList = Metode::all();

        return view('anggota.inputuser.historitabungan', compact('historiTabungan', 'users', 'uniqueProduk', 'metodeList'));
    }

}
