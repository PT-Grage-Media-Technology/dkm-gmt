<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DataTransaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataTransaksiController extends Controller
{
    public function indexHistori()
    {
        $adminId = Auth::guard('lomin')->id();
        $dataTransaksi = DataTransaksi::where('admin_id', $adminId)->get(); // Mengambil semua transaksi untuk admin yang sedang login
        return view('admin.setting.historiDataTransaksi', compact('dataTransaksi'));
    }

    public function Transaksi()
    {
        $adminId = Auth::guard('lomin')->id();
        $dataTransaksi = DataTransaksi::where('admin_id', $adminId)->first();
        return view('admin.setting.dataTransaksi', compact('adminId','dataTransaksi'));
    }

    public function index($id)
    {
        $adminId = Auth::guard('lomin')->id();
        $dataTransaksi = DataTransaksi::where('id_dataTransaksi', $id)->where('admin_id', $adminId)->first();

        if (!$dataTransaksi) {
            return redirect()->route('data-transaksi-histori')->withErrors(['error' => 'Data transaksi tidak ditemukan atau tidak milik Anda.']);
        }

        return view('admin.setting.dataTransaksi', compact('dataTransaksi'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'no_rekening' => 'required|string|max:255',
            'no_dana' => 'required|string|max:255',
        ]);

        $adminId = Auth::guard('lomin')->id();

        $dataTransaksi = new DataTransaksi();
        $dataTransaksi->admin_id = $adminId;
        $dataTransaksi->no_rekening = $request->no_rekening;
        $dataTransaksi->no_dana = $request->no_dana;
        $dataTransaksi->save();

        return redirect()->route('data-transaksi-histori')->with('success', 'Data transaksi berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_rekening' => 'required|string|max:255',
            'no_dana' => 'required|string|max:255',
        ]);

        $adminId = Auth::guard('lomin')->id();
        $dataTransaksi = DataTransaksi::where('id_dataTransaksi', $id)->where('admin_id', $adminId)->first();

        if (!$dataTransaksi) {
            return redirect()->back()->withErrors(['error' => 'Data transaksi tidak ditemukan atau tidak milik Anda.']);
        }

        $dataTransaksi->update([
            'no_rekening' => $request->input('no_rekening'),
            'no_dana' => $request->input('no_dana'),
        ]);

        return redirect()->route('data-transaksi-histori')->with('success', 'Data transaksi berhasil diperbarui.');
    }
}
