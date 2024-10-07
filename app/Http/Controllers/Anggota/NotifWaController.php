<?php

namespace App\Http\Controllers\Anggota;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\ProdukHewan;
use App\Models\TabunganKur;
use App\Models\TabunganInput;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class NotifWaController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $tabunganKurs = TabunganKur::where('user_id', $user->id)->get();
        $produkHewan = ProdukHewan::all();

        foreach ($tabunganKurs as $tabunganKur) {
            // Hitung total pembayaran bulan ini
            $totalBayarBulanIni = TabunganInput::where('tabungan_kur_id', $tabunganKur->id)
                                                ->whereYear('rincian_tanggal_bayar', now()->year)
                                                ->whereMonth('rincian_tanggal_bayar', now()->month)
                                                ->sum('total_bayar');

            // Hitung jumlah cicilan per bulan
            $jumlahCicilanPerBulan = (float) $tabunganKur->jumlah_cicilan_bulan;

            // Hitung sisa pembayaran bulan ini
            $sisaPembayaranBulanIni = $jumlahCicilanPerBulan - $totalBayarBulanIni;

            // Pastikan tidak ada nilai negatif
            $sisaPembayaranBulanIni = max($sisaPembayaranBulanIni, 0);

            // Temukan produk hewan terkait
            $produk = $produkHewan->find($tabunganKur->produk_id);

            // Buat pesan
            $message = 'Halo ' . $user->nama_lengkap . ', kami dari DKM blablabla ingin mengingatkan bahwa tabungan Anda untuk ' . $produk->name . ' di bulan ini perlu dibayar. Sisa tabungan yang perlu dibayar bulan ini adalah sebesar Rp ' . number_format($sisaPembayaranBulanIni, 2) . '. Mohon segera lakukan pembayaran agar tabungan Anda dapat memenuhi target bulan yang diinginkan. Terima kasih.';

            // URL tujuan
            $url = 'https://wa.eblieshop.online/send-message';

            // Client Guzzle
            $client = new Client();

            // Mengirim permintaan POST
            $response = $client->post($url, [
                'form_params' => [
                    'number' => $user->no_telepon,
                    'message' => $message
                ]
            ]);

            Log::info('Pesan terkirim ke ' . $user->no_telepon . ': ' . $message);
        }

        return redirect()->back()->with('success', 'Notifikasi berhasil dikirim ke ' . $user->nama_lengkap);
    }
}
