<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\produkhewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImputAlamatController extends Controller
{
    public function form()
    {
        $alamat = Auth::user()->alamat;
        $produk = produkhewan::all();
        return view('settingaccount.alamat', compact('alamat','produk'));
    }

    // Method untuk menyimpan atau mengupdate alamat
    public function storeUpdate(Request $request, $id_alamat = null)
    {
        // Ambil semua input data kecuali _token dan _method
        $data = $request->except('_token', '_method');

        // Tambahkan user ID ke data
        $data['id_user'] = Auth::id();

        if ($id_alamat) {
            // Update alamat yang sudah ada berdasarkan id_alamat
            $alamat = Alamat::where('id_alamat', $id_alamat)
                            ->where('id_user', Auth::id())
                            ->firstOrFail();
            $alamat->update($data);
        } else {
            // Cek apakah user sudah memiliki alamat
            $alamat = Alamat::where('id_user', Auth::id())->first();

            if ($alamat) {
                // Update alamat yang sudah ada untuk user tersebut
                $alamat->update($data);
            } else {
                // Buat alamat baru jika user belum memiliki alamat
                Alamat::create($data);
            }
        }

        // Redirect ke halaman settingAkun dengan pesan sukses
        return redirect()->route('beranda')->with('success', 'Alamat berhasil disimpan atau diperbarui.');
    }
}
