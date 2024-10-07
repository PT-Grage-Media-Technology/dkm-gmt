<?php

namespace App\Http\Controllers;

use App\Models\produkhewan;
use App\Models\Tabungankur;
use App\Models\Metode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabungankurController extends Controller
{
    public function store(Request $request)
    {


        $data['user_id'] = Auth::id();
        $data['status_persetujuan'] = 'pending';

        // dd($request->all());
        Tabungankur::create(
            [
                'user_id' => $data['user_id'],
                'status_persetujuan' => $data['status_persetujuan'],
                'awal_waktu_tabungan' => $request->awal_waktu_tabungan,
                'target_waktu_tabungan' => $request->target_waktu_tabungan,
                'jumlah_cicilan_bulan' => $request->jumlah_cicilan_bulan,
                'produk_id' => $request->produk_id,
                'metode_id' => $request->metode_id,
            ]
        );

        return redirect()->route('tabungan.index');
    }

    public function index()
    {
        $tabungankurData = Tabungankur::all();
        $produk = produkhewan::all(); // or specific product you want to pass
        return view('admin.tabungankurban', compact('tabungankurData', 'produk'));
    }



    public function showTabungan($id)
    {
        $produk = produkhewan::where('id', $id)->firstOrFail();
        $produkhewan = produkHewan::all();
        $metode = Metode::all(); // Fetch data from 'metode' table
        return view('tabungan.inputtabungan', compact('produk', 'produkhewan', 'metode'));
    }


    public function rincian()
    {
        $tabungankur = Tabungankur::all();
        return view('tabungan.rinciantabungan', compact('tabungankur'));
    }

    public function showRincianTabungan()
    {
        $tabungankur = Tabungankur::all();
        return view('tabungan.rinciantabungan', compact('tabungankur'));
    }

    public function approvePengajuan($id)
    {
        $tabungankur = Tabungankur::findOrFail($id);
        $tabungankur->status_persetujuan = 'Disetujui';
        $tabungankur->save();

       return redirect()->back()->with('success', 'Pengajuan Berhasil Disetujui');
        //return response()->json(['success' => true]);
    }

    public function rejectPengajuan($id)
    {
        $pengajuan = Tabungankur::findOrFail($id);
        $pengajuan->status_persetujuan = 'Tidak Disetujui';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan Berhasil Ditolak');
    }

    public function approvalUser()
    {
        $tabungankurData = Tabungankur::with(['produk', 'alamat'])->get();
        return view('admin.datatabungan', compact('tabungankurData'));
    }

    public function show($id)
    {
        $tabungankur = Tabungankur::findOrFail($id);
        return view('layouts.tabungannot', compact('tabungankur'));
    }

    public function showInputForm()
{
    $tabungankur = Tabungankur::latest()->first(); // Fetch the latest tabungan record
    $metodes = Metode::all(); // Fetch all metode records

    return view('tabungan.index', compact('tabungankur', 'metodes'));

    // $user_id = Auth::id();
    // $tabungankur = Tabungankur::with('metode')->where('user_id', $user_id)->latest()->first(); // Fetch the latest tabungan record for the current user with the related metode

    // return view('tabungan.index', compact('tabungankur'));
}


}
