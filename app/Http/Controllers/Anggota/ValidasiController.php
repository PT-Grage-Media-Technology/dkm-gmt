<?php

namespace App\Http\Controllers\Anggota;

use App\Models\Tabungankur;
use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;
use App\Http\Controllers\Controller;

class ValidasiController extends Controller
{
    public function index()
    {
        // Fetch the Tabungankur and BuktiPembayaran data
        // Adjust the query based on your requirements
        $tabunganKur = Tabungankur::all(); // or use any condition to fetch specific records
        $buktiPembayaran = BuktiPembayaran::all()->keyBy('tabungankurs_id'); // similarly, adjust this query if needed

        // Pass data to the view
        return view('anggota.inputuser.validasi', compact('tabunganKur', 'buktiPembayaran'));
    }

    public function showUploadForm($id)
    {
        $buktiPembayaran = BuktiPembayaran::find($id);
        $tabunganKur = Tabungankur::find($id); // Atau cara lain untuk mendapatkan data yang sesuai
        return view('anggota.inputuser.validasi', compact('buktiPembayaran', 'tabunganKur'));
    }

    public function uploadFoto(Request $request)
    {
        $request->validate([
            'id_buktipembayaran' => 'required|exists:bukti_pembayarans,id_buktipembayaran',
            'bukti_validasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $buktiPembayaran = BuktiPembayaran::findOrFail($request->input('id_buktipembayaran'));

        // Handle file upload
        if ($request->hasFile('bukti_validasi')) {
            $file = $request->file('bukti_validasi');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/validasi', $filename);

            // Update the validation photo field
            $buktiPembayaran->bukti_validasi = 'validasi/' . $filename;
        }

        // Update status to 'invalid'
        $buktiPembayaran->status = 'invalid';
        $buktiPembayaran->save();

        return redirect()->route('list.penabung', ['user' => $buktiPembayaran->user_id, 'tabunganKurId' => $buktiPembayaran->tabunganKur_id])
                            ->with('success', 'Foto validasi berhasil diunggah dan status diubah.');
    }


}
