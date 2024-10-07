<?php

namespace App\Http\Controllers\anggota;

use Log;
use App\Models\User;
use App\Models\Tabungankur;
use Illuminate\Http\Request;
use App\Models\TabunganInput;
use App\Models\BuktiPembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InputUserAnggotaController extends Controller
{
    public function inputTabungan($userId, $tabunganKurId)
    {
        $user = User::findOrFail($userId);
        $tabunganKurs = Tabungankur::with('metode', 'produk')->findOrFail($tabunganKurId);

        // Hitung total pembayaran bulan ini
        $totalBayarBulanIni = TabunganInput::where('tabungan_kur_id', $tabunganKurs->id)
                                            ->whereYear('rincian_tanggal_bayar', now()->year)
                                            ->whereMonth('rincian_tanggal_bayar', now()->month)
                                            ->sum('total_bayar');

        // Hitung jumlah cicilan per bulan
        $jumlahCicilanPerBulan = (float) $tabunganKurs->jumlah_cicilan_bulan;

        // Hitung sisa pembayaran bulan ini
        $sisaPembayaranBulanIni = $jumlahCicilanPerBulan - $totalBayarBulanIni;

        // Pastikan tidak ada nilai negatif
        $sisaPembayaranBulanIni = max($sisaPembayaranBulanIni, 0);

        // Jika sisa pembayaran bulan ini sudah nol, tampilkan pesan peringatan
        if ($sisaPembayaranBulanIni == 0) {
            $peringatan = "Penabung sudah memenuhi pembayaran bulan ini. Silakan coba lagi bulan depan.";
            return view('anggota.inputuser.imputtabungauser', compact('user', 'tabunganKurs', 'sisaPembayaranBulanIni', 'peringatan'));
        }

        // Ambil bukti pembayaran jika metode bukan 'Bayar di Tempat'
        $buktiPembayaran = null;
        if ($tabunganKurs->metode->jenis !== 'Bayar di Tempat') {
            $buktiPembayaran = BuktiPembayaran::where('tabungankurs_id', $tabunganKurs->id)
                                                ->where('user_id', $user->id)
                                                ->where('status', 'done')  // Tampilkan hanya bukti pembayaran dengan status "done"
                                                ->first();
        }

        return view('anggota.inputuser.imputtabungauser', compact('user', 'tabunganKurs', 'sisaPembayaranBulanIni', 'buktiPembayaran'));
    }


    public function storeTabungan(Request $request, $userId, $tabunganKurId)
    {
        $request->validate([
            'rincian_tanggal_bayar' => 'required|date',
            'total_bayar' => 'required|numeric',
            'minus_pembayaran' => 'nullable|numeric',
            'bukti_proses' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tabungan_kur_id' => 'required|exists:tabungankurs,id',
            'bukti_pembayaran_id' => 'nullable|exists:bukti_pembayarans,id_buktipembayaran',
        ]);

        $input = $request->all();
        $input['user_id'] = $userId;

        $tabunganKur = Tabungankur::with('metode', 'produk')->findOrFail($tabunganKurId);

        // Pastikan metode pembayaran 'Bayar di Tempat' memerlukan bukti proses
        if ($tabunganKur->metode->jenis === 'Bayar di Tempat') {
            if ($request->hasFile('bukti_proses')) {
                $imagePath = $request->file('bukti_proses')->store('bukti_proses', 'public');
                $input['bukti_proses'] = $imagePath;
            } else {
                return redirect()->back()->with('error', 'Bukti proses harus diunggah untuk metode bayar di tempat.');
            }
        } else {
            $input['bukti_proses'] = null;
        }

        // Hitung sisa pembayaran yang sudah ada
        $sisaPembayaran = $tabunganKur->sisaPembayaran();
        $totalBayar = $request->total_bayar;

        // Kurangi sisa pembayaran dengan total bayar saat ini
        $minusPembayaran = max($sisaPembayaran - $totalBayar, 0);  // Pastikan tidak kurang dari 0

        // Simpan nilai minus_pembayaran
        $input['minus_pembayaran'] = $minusPembayaran;

        // Hitung total pembayaran bulan ini
        $totalBayarBulanIni = TabunganInput::where('tabungan_kur_id', $tabunganKur->id)
                                            ->whereYear('rincian_tanggal_bayar', now()->year)
                                            ->whereMonth('rincian_tanggal_bayar', now()->month)
                                            ->sum('total_bayar');

        $jumlahCicilanPerBulan = (float) $tabunganKur->jumlah_cicilan_bulan;

        // Jika sisa pembayaran bulan ini adalah 0, tolak input baru
        if ($totalBayarBulanIni >= $jumlahCicilanPerBulan) {
            return redirect()->route('list.penabung')->with('error', 'Pembayaran bulan ini telah terpenuhi. Silakan coba lagi bulan depan.');
        }

        $totalBayarBulanIni += $totalBayar;

        // Ambil sisa_bulan terakhir yang tercatat di TabunganInput, atau inisialisasi dengan target_waktu_tabungan jika belum ada entri
        $lastTabunganInput = TabunganInput::where('tabungan_kur_id', $tabunganKur->id)->latest()->first();
        $sisaBulan = $lastTabunganInput ? $lastTabunganInput->sisa_bulan : $tabunganKur->target_waktu_tabungan;

        if ($totalBayarBulanIni >= $jumlahCicilanPerBulan) {
            // Hitung pengurangan sisa bulan berdasarkan total pembayaran bulan ini
            $penguranganBulan = intdiv($totalBayarBulanIni, $jumlahCicilanPerBulan);
            $sisaBulan = max($sisaBulan - $penguranganBulan, 0);
        }

        // Simpan entri baru dengan sisa_bulan yang dihitung
        $input['sisa_bulan'] = $sisaBulan;
        Log::info('Data Input sebelum disimpan: ' . json_encode($input));
        $tabunganInput = TabunganInput::create($input);
        Log::info('Tabungan Input ID setelah disimpan: ' . $tabunganInput->id_tabunganinputs);

        // Jika metode pembayaran bukan 'Bayar di Tempat', update bukti pembayaran
        if ($tabunganKur->metode->jenis !== 'Bayar di Tempat') {
            // Ambil bukti pembayaran yang sesuai dari tabel bukti_pembayarans dengan status "done"
            $buktiPembayaran = BuktiPembayaran::where('tabungankurs_id', $tabunganKur->id)
                                                ->where('user_id', $userId)
                                                ->where('status', 'done') // ambil bukti dengan status 'done'
                                                ->first();
            if ($buktiPembayaran) {
                // Perbarui status bukti pembayaran menjadi 'pending'
                $buktiPembayaran->update(['status' => 'onchecking']);
                // Update bukti_pembayaran_id di tabungan_inputs dengan ID yang benar
                $tabunganInput->update(['bukti_pembayaran_id' => $buktiPembayaran->id_buktipembayaran]);
            }
        }

        return redirect()->route('list.penabung')->with('success', 'Data tabungan berhasil disimpan.');
    }







}
