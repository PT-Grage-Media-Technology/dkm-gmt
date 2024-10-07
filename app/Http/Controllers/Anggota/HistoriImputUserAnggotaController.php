<?php

namespace App\Http\Controllers\anggota;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Tabungankur;
use Illuminate\Http\Request;
use App\Models\TabunganInput;
use App\Models\BuktiPembayaran;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoriImputUserAnggotaController extends Controller
{
    public function indeximput()
    {
        return view('anggota.inputuser.imputtabungauser');
    }

    public function index()
    {
        $anggotaId = Auth::id();
        $approvedTabunganKurs = Tabungankur::where('status_persetujuan', 'Disetujui')
            ->whereHas('user', function ($query) use ($anggotaId) {
                $query->where('anggota_id', $anggotaId);
            })
            ->get();

        Log::info('Approved Tabungan Kurs: ', ['approved_tabungan_kurs' => $approvedTabunganKurs->toArray()]);

        $historiTabungan = TabunganInput::with('user', 'tabunganKur.produk')
            ->whereIn('tabungan_kur_id', $approvedTabunganKurs->pluck('id'))
            ->whereHas('buktiPembayaran', function ($query) {
                $query->where('status', 'pending');
            })
            ->get()
            ->each(function ($tabungan) {
                $tabungan->updateSisaBulan();
            });

        Log::info('Histori Tabungan: ', ['histori_tabungan' => $historiTabungan->toArray()]);

        return view('anggota.inputuser.historitabungan', compact('historiTabungan'));
    }

    public function showAnggota($id)
    {
        $anggota = Anggota::with(['users.tabungankur.produk'])
                        ->findOrFail($id);

        return view('anggota.inputuser.anggota', compact('anggota'));
    }

    // public function showListPenabung()
    // {
    //     $user = Auth::user();
    //     $loggedInUser = Auth::guard('anggota')->user();
    //     $anggotaId = $loggedInUser ? $loggedInUser->id_anggota : null;

    //     if (!$anggotaId) {
    //         return redirect()->route('login');
    //     }

    //     $users = User::where('anggota_id', $anggotaId)->get();
    //     // $filteredUsers = $users->filter(function ($user) {
    //     //     return $user->tabungankur && $user->tabungankur->isNotEmpty();
    //     // });
    //     // $filteredUsers = $users->filter(function ($user) {
    //     //     return $user->tabungankur->where('status_persetujuan', 'Disetujui')->isNotEmpty();
    //     // })->map(function ($user) {
    //     //     $user->tabungankur = $user->tabungankur->filter(function ($tabunganKur) {
    //     //         return $tabunganKur->status_persetujuan === 'Disetujui';
    //     //     });
    //     //     return $user;
    //     // });
    //     $filteredUsers = $users->map(function ($user) {
    //         // Filter hanya tabungan yang disetujui
    //         $user->tabungankur = $user->tabungankur->filter(function ($tabunganKur) {
    //             return $tabunganKur->status_persetujuan === 'Disetujui';
    //         });

    //         return $user;
    //     });


    //     $buktiPembayaran = [];
    //     foreach ($filteredUsers as $user) {
    //         foreach ($user->tabungankur as $tabunganKur) {
    //             // Muat relasi metode
    //             $tabunganKur->load('metode');

    //             // Logika untuk mengambil sisa_bulan terkecil dari TabunganInput terkait
    //             $smallestSisaBulan = TabunganInput::where('tabungan_kur_id', $tabunganKur->id)->min('sisa_bulan');

    //             // Gunakan nilai terkecil jika ada
    //             $tabunganKur->sisa_bulan = $smallestSisaBulan !== null ? $smallestSisaBulan : $tabunganKur->target_waktu_tabungan;

    //             // Ambil bukti pembayaran dengan status 'pending'
    //             if ($tabunganKur->metode->jenis !== 'Bayar di Tempat') {
    //                 $buktiPembayaran[$tabunganKur->id] = BuktiPembayaran::where('tabungankurs_id', $tabunganKur->id)
    //                     ->where('user_id', $user->id)
    //                     // ->where('status', 'pending')
    //                     // ->where('status', 'done')
    //                     ->whereIn('status', ['pending', 'done'])
    //                     ->orderBy('created_at', 'asc') // Ambil yang paling lama
    //                     ->first();
    //             } else {
    //                 $buktiPembayaran[$tabunganKur->id] = null;
    //             }
    //         }
    //     }
    //     $buktitf = TabunganInput::with('buktiPembayaran')->get();


    //     // dd($buktitf);



    //     return view('anggota.inputuser.index', compact('filteredUsers', 'buktiPembayaran','buktitf'));
    // }

    public function showListPenabung()
{
    $user = Auth::user();
    $loggedInUser = Auth::guard('anggota')->user();
    $anggotaId = $loggedInUser ? $loggedInUser->id_anggota : null;

    if (!$anggotaId) {
        return redirect()->route('login');
    }

    $users = User::where('anggota_id', $anggotaId)->get();
    $filteredUsers = $users->map(function ($user) {
        // Filter hanya tabungan yang disetujui
        $user->tabungankur = $user->tabungankur->filter(function ($tabunganKur) {
            return $tabunganKur->status_persetujuan === 'Disetujui';
        });

        return $user;
    });

    $buktiPembayaran = [];
    foreach ($filteredUsers as $user) {
        foreach ($user->tabungankur as $tabunganKur) {
            // Muat relasi metode
            $tabunganKur->load('metode');

            // Logika untuk mengambil sisa_bulan terkecil dari TabunganInput terkait
            $smallestSisaBulan = TabunganInput::where('tabungan_kur_id', $tabunganKur->id)->min('sisa_bulan');

            // Gunakan nilai terkecil jika ada
            $tabunganKur->sisa_bulan = $smallestSisaBulan !== null ? $smallestSisaBulan : $tabunganKur->target_waktu_tabungan;

            // Ambil bukti pembayaran dengan status 'pending'
            if ($tabunganKur->metode->jenis !== 'Bayar di Tempat') {
                $buktiPembayaran[$tabunganKur->id] = BuktiPembayaran::where('tabungankurs_id', $tabunganKur->id)
                    ->where('user_id', $user->id)
                    // ->where('status', 'pending') // Ambil hanya yang statusnya 'pending'
                    ->whereIn('status', ['pending', 'done'])
                    ->orderBy('created_at', 'asc') // Ambil yang paling lama
                    ->first();

            } else {
                $buktiPembayaran[$tabunganKur->id] = null;
            }
        }
    }
    $buktitf = TabunganInput::with('buktiPembayaran')->get();

    return view('anggota.inputuser.index', compact('filteredUsers', 'buktiPembayaran', 'buktitf'));
}


    // public function updateStatus(Request $request)
    // {
    //     $id = $request->input('id_buktipembayaran');
    //     $status = $request->input('status') ? 'done' : 'pending'; // Default ke 'pending' jika tidak tercentang

    //     // dd($id, $status);

    //     $buktiPembayaran = BuktiPembayaran::where('id_buktipembayaran', $id)->first();

    //     // dd($buktiPembayaran);

    //     if ($buktiPembayaran) {
    //         $buktiPembayaran->status = $status;
    //         $buktiPembayaran->save();
    //     }

    //     return redirect()->back()->with('success', 'Status updated successfully');
    // }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id_buktipembayaran');

        // Ambil bukti pembayaran yang sesuai dengan ID
        $buktiPembayaran = BuktiPembayaran::findOrFail($id);

        // Mengatur status default ke 'pending'
        $status = 'pending';

        // Jika status_done dicentang dan status_invalid tidak dicentang
        if ($request->has('status_done') && !$request->has('status_invalid')) {
            $status = 'done';
        }

        // Jika status_invalid dicentang, status akan diatur menjadi 'invalid'
        if ($request->has('status_invalid') && !$request->has('status_done')) {
            $status = 'invalid';
            return redirect()->route('validasi', ['id' => $id]);
        }

        // Perbarui status bukti pembayaran
        $buktiPembayaran->status = $status;
        $buktiPembayaran->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Status updated successfully');
    }



    public function showFormImputTabunganUser()
    {
        $userId = Auth::id();
        $users = User::where('anggota_id', $userId)->get();

        Log::info('Show Form Imput Tabungan User: ', ['users' => $users->toArray()]);

        return view('anggota.inputuser.imputtabungauser', compact('users'));
    }

    public function imputTabunganUser(Request $request)
    {
        $validatedData = $request->validate([
            'tabungan_kur_id' => 'required|exists:tabungankurs,id',
            'total_bayar' => 'required|numeric|min:0',
            'rincian_tanggal_bayar' => 'required|date',
            'bukti_proses' => 'nullable|image|max:2048',
        ]);

        $tabunganKur = Tabungankur::findOrFail($validatedData['tabungan_kur_id']);

        $tabunganInput = new TabunganInput([
            'user_id' => $tabunganKur->user_id,
            'rincian_tanggal_bayar' => $validatedData['rincian_tanggal_bayar'],
            'total_bayar' => $validatedData['total_bayar'],
            'minus_pembayaran' => 0,
        ]);

        if ($request->hasFile('bukti_proses')) {
            $imagePath = $request->file('bukti_proses')->store('bukti_proses', 'public');
            $tabunganInput->bukti_proses = $imagePath;
        }

        $tabunganKur->inputs()->save($tabunganInput);

        $tabunganInput->updatePembayaran($validatedData['total_bayar']);

        // Update bukti pembayaran status
        $buktiPembayaran = BuktiPembayaran::where('tabungankurs_id', $tabunganKur->id)
            ->where('user_id', $tabunganKur->user_id)
            ->first();

        if ($buktiPembayaran) {
            $buktiPembayaran->status = 'done';
            $buktiPembayaran->save();
        }

        return redirect()->route('anggota.historitabungan')->with('success', 'Tabungan berhasil diinput');
    }

}
