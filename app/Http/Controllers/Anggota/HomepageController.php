<?php

namespace App\Http\Controllers\anggota;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TabunganInput;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    // public function index()
    // {
    //     if (!Auth::guard('anggota')->check()) {
    //         return redirect()->route('anggota.login');
    //     }

    //     $anggota = Auth::guard('anggota')->user();
    //     $users = $anggota->users()->with('tabunganKur.tabunganInputs', 'tabunganKur.produk', 'tabunganKur.metode')->get();

    //     $totalPemasukan = TabunganInput::sum('total_bayar');

    //     return view('anggota.home', compact('users', 'totalPemasukan'));
    // }

    // public function index()
    // {
    //     if (!Auth::guard('anggota')->check()) {
    //         return redirect()->route('anggota.login');
    //     }
    //     $anggota = Auth::guard('anggota')->user();
    //     $users = $anggota->users()->with('tabunganKur.tabunganInputs', 'tabunganKur.produk', 'tabunganKur.metode')->get();
    //     $totalPemasukan = TabunganInput::sum('total_bayar');

    //     // Menyaring data terbaru
    //     foreach ($users as $user) {
    //         foreach ($user->tabunganKur as $tabungan) {
    //             // Mengambil sisa bulan terbaru
    //             // $tabungan->latest_sisa_bulan = $tabungan->tabunganInputs->sortByDesc('created_at')->first()->sisa_bulan ?? 0;
    //              // Logika untuk mengambil sisa_bulan terkecil dari TabunganInput terkait
    //             $smallestSisaBulan = TabunganInput::where('tabungan_kur_id', $tabungan->id)->min('sisa_bulan');
    //              // Gunakan nilai terkecil jika ada
    //             $tabungan->sisa_bulan = $smallestSisaBulan !== null ? $smallestSisaBulan : $tabungan->target_waktu_tabungan;
    //             // Mengambil tanggal bayar terbaru
    //             $tabungan->latest_tanggal_bayar = $tabungan->tabunganInputs->sortByDesc('created_at')->first()->rincian_tanggal_bayar ?? null;
    //         }
    //     }
    //     $jumlahPenabung = $users->count();
    //     return view('anggota.home', compact('users', 'totalPemasukan', 'jumlahPenabung'));
    // }

//     public function index()
// {
//     if (!Auth::guard('anggota')->check()) {
//         return redirect()->route('anggota.login');
//     }
//     $anggota = Auth::guard('anggota')->user();
//     $users = $anggota->users()->with('tabunganKur.tabunganInputs', 'tabunganKur.produk', 'tabunganKur.metode')->get();

//     // Hitung total pemasukan hanya dari tabunganInputs yang terkait dengan users milik anggota yang sedang login
//     $totalPemasukan = 0;
//     foreach ($users as $user) {
//         foreach ($user->tabunganKur as $tabungan) {
//             $totalPemasukan += $tabungan->tabunganInputs->sum('total_bayar');
//         }
//     }

//     // Menyaring data terbaru
//     foreach ($users as $user) {
//         foreach ($user->tabunganKur as $tabungan) {
//             // Mengambil sisa bulan terbaru
//             $smallestSisaBulan = TabunganInput::where('tabungan_kur_id', $tabungan->id)->min('sisa_bulan');
//             // Gunakan nilai terkecil jika ada
//             $tabungan->sisa_bulan = $smallestSisaBulan !== null ? $smallestSisaBulan : $tabungan->target_waktu_tabungan;
//             // Mengambil tanggal bayar terbaru
//             $tabungan->latest_tanggal_bayar = $tabungan->tabunganInputs->sortByDesc('created_at')->first()->rincian_tanggal_bayar ?? null;
//         }
//     }
//     $jumlahPenabung = $users->count();
//     return view('anggota.home', compact('users', 'totalPemasukan', 'jumlahPenabung'));
// }

public function index()
{
    if (!Auth::guard('anggota')->check()) {
        return redirect()->route('anggota.login');
    }
    $anggota = Auth::guard('anggota')->user();
    $users = $anggota->users()->with(['tabunganKur' => function($query) {
        $query->where('status_persetujuan', 'disetujui');
    }, 'tabunganKur.tabunganInputs', 'tabunganKur.produk', 'tabunganKur.metode'])->get();

    // Hitung total pemasukan hanya dari tabunganInputs yang terkait dengan users milik anggota yang sedang login
    $totalPemasukan = 0;
    foreach ($users as $user) {
        foreach ($user->tabunganKur as $tabungan) {
            $totalPemasukan += $tabungan->tabunganInputs->sum('total_bayar');
        }
    }

    // Menyaring data terbaru
    foreach ($users as $user) {
        foreach ($user->tabunganKur as $tabungan) {
            // Mengambil sisa bulan terbaru
            $smallestSisaBulan = TabunganInput::where('tabungan_kur_id', $tabungan->id)->min('sisa_bulan');
            // Gunakan nilai terkecil jika ada
            $tabungan->sisa_bulan = $smallestSisaBulan !== null ? $smallestSisaBulan : $tabungan->target_waktu_tabungan;

            // Mengambil status tabungan
            $latestInput = $tabungan->tabunganInputs->sortByDesc('created_at')->first();
            $tabungan->status_tabungan = 'Belum Mulai';
            if ($latestInput) {
                $minusPembayaran = floatval($latestInput->minus_pembayaran);
                if (bccomp($minusPembayaran, '0.00', 2) === 0) {
                    $tabungan->status_tabungan = 'Selesai';
                } else {
                    $tabungan->status_tabungan = 'Proses';
                }
            } else {
                $tabungan->status_tabungan = 'Proses';
            }
        }
    }
    $jumlahPenabung = $users->count();
    return view('anggota.home', compact('users', 'totalPemasukan', 'jumlahPenabung'));
}



}
