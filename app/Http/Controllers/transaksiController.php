<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\produkhewan;
use App\Models\Tabungankur;
use Illuminate\Http\Request;
use App\Models\TabunganInput;
use App\Models\BuktiPembayaran;
use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
{
    public function index($id)
    {
        $tabunganInputs = TabunganInput::where('user_id', auth()->user()->id)->get();
        return view('layouts.transaksi', compact('tabunganInputs', 'id'));
    }

    // public function showUploadForm($id)
    // {
    //     $tabunganKur = Tabungankur::find($id);

    //     if (!$tabunganKur || $tabunganKur->user_id != auth()->user()->id) {
    //         return redirect()->route('transaksi')->with('error', 'Data tidak ditemukan.');
    //     }

    //     return view('layouts.transaksi', compact('tabunganKur'));
    // }

    public function showUploadForm($id)
    {
        $tabunganKur = Tabungankur::find($id);

        if (!$tabunganKur || $tabunganKur->user_id != auth()->user()->id) {
            return redirect()->route('transaksi')->with('error', 'Data tidak ditemukan.');
        }
        // dd(auth()->user()->id, $id);

        // Mengambil data bukti_pembayarans berdasarkan user_id yang sedang login dan status "invalid"
        $buktiPembayaran = BuktiPembayaran::where('user_id', auth()->user()->id)
            ->where('tabungankurs_id', $id)
            ->where('status', 'invalid')  // Tambahkan filter status "invalid"
            ->first();

            // dd($buktiPembayaran);

        return view('layouts.transaksi', compact('tabunganKur', 'buktiPembayaran'));
    }



    public function uploadBukti(Request $request, $id)
    {
        // Validasi file upload
        $request->validate([
            'bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Memeriksa apakah file diunggah
        if ($request->file('bukti_transaksi')) {
            // Menyimpan file di direktori 'public/bukti_transaksi'
            $file = $request->file('bukti_transaksi');
            $path = $file->store('bukti_transaksi', 'public');

            // Menemukan Tabungankur berdasarkan ID yang diterima
            $tabungankur = Tabungankur::find($id);

            if ($tabungankur && $tabungankur->user_id == auth()->user()->id) {
                // Menyimpan data ke tabel bukti_pembayarans
                BuktiPembayaran::create([
                    'tabungankurs_id' => $tabungankur->id,
                    'user_id' => auth()->user()->id,
                    'bukti_transaksi' => $path,
                ]);

                return back()->with('success', 'Bukti proses berhasil diunggah!');
            } else {
                return back()->with('error', 'Data tabungankur tidak ditemukan atau akses ditolak.');
            }
        }

        return back()->with('error', 'Gagal mengunggah bukti proses.');
    }

//     public function showBuktiPembayaran($id_buktipembayaran, $user_id)
// {
//     $buktiPembayaran = DB::table('bukti_pembayarans')
//         ->select('bukti_transaksi', 'bukti_validasi')
//         ->where('id_buktipembayaran', $id_buktipembayaran)
//         ->where('user_id', $user_id)
//         ->first();

//     // Mengirimkan data ke view
//     if ($buktiPembayaran) {
//         return view('show_bukti_pembayaran', [
//             'bukti_transaksi' => $buktiPembayaran->bukti_transaksi ? asset('storage/' . $buktiPembayaran->bukti_transaksi) : null,
//             'bukti_validasi' => $buktiPembayaran->bukti_validasi ? asset('storage/' . $buktiPembayaran->bukti_validasi) : null,
//         ]);
//     } else {
//         return view('layouts.transaksi', [
//             'bukti_transaksi' => null,
//             'bukti_validasi' => null,
//         ]);
//     }
// }


}
