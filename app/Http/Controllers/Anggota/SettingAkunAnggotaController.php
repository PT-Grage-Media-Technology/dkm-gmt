<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingAkunAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $anggota = auth()->user();
        $anggota = Auth::guard('anggota')->user();
        return view('anggota.settings.ubah_data_anggota', compact('anggota'));
    }

    public function indexedit(){
        // $anggota = auth()->user();
        $anggota = Auth::guard('anggota')->user();
        return view('anggota.settings.edit_data_anggota', compact('anggota'));
    }

    public function updatedataanggota(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'no_telepon' => 'nullable|string',
        ]);

        // $anggota = Auth::user();
        $anggota = Auth::guard('anggota')->user();
        $anggota->nama_lengkap = $request->nama_lengkap;
        $anggota->no_telepon = $request->no_telepon;
        $anggota->save();

        return redirect('/settingakunanggota')->with('success', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
