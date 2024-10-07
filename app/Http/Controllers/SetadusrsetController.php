<?php

namespace App\Http\Controllers;

use App\Models\Setadusrset;
use Illuminate\Http\Request;

class SetadusrsetController extends Controller
{
    // Menampilkan form create
    public function create()
    {
        return view('setadusr.create');
    }

    // Menyimpan data
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Ambil record terakhir jika ada
        $setadusrset = Setadusrset::latest()->first();

        $logo = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('logos', 'public');
        }

        if ($setadusrset) {
            // Update record yang ada
            $setadusrset->update([
                'logo' => $logo,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
        } else {
            // Buat record baru jika belum ada
            Setadusrset::create([
                'logo' => $logo,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
        }

        return redirect()->route('setadusrset.show')->with('success', 'Data berhasil disimpan');
    }

    // Menampilkan data yang tersimpan
    public function show()
    {
        $setadusrset = Setadusrset::latest()->first(); // Mengambil data terakhir yang disimpan

        if (!$setadusrset) {
            return redirect()->route('setadusr.create')->with('error', 'Tidak ada data yang ditemukan, silakan input data terlebih dahulu.');
        }

        return view('setadusrset.show', compact('setadusrset'));
    }
    public function main()
    {
        // dd('masuk');
        $setadusrset = Setadusrset::latest()->first();

        return view('main', compact('setadusrset'));
    }
}
