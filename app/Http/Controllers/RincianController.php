<?php
namespace App\Http\Controllers;

use App\Models\TabunganInput;
use App\Models\Tabungankur;
use App\Models\Produkhewan;
use Illuminate\Http\Request;

class RincianController extends Controller
{
    // public function show($id)
    // {
    //     // Mengambil data Tabungankur dan relasi produk
    //     $tabungankur = Tabungankur::with('produk')->findOrFail($id);
    //     $produkList = Produkhewan::all();


    //     // Mengambil data tabungan dengan relasi produk jika produk_id ada
    //     $produkId = request()->query('produk_id');

    //     $filteredTabunganInputs = TabunganInput::with('tabunganKur', 'tabunganKur.produk') // Memuat relasi 'tabunganKur' dan 'tabunganKur.produk'
    //         ->where('tabungan_kur_id', $id);

    //     // Memfilter jika produk_id ada
    //     if ($produkId) {
    //         $filteredTabunganInputs = $filteredTabunganInputs->whereHas('tabunganKur.produk', function($query) use ($produkId) {
    //             $query->where('id', $produkId);
    //         });
    //     }

    //      // Tambahkan filter untuk sisa_bulan > 0
    //     // $cekSisaBulan = $filteredTabunganInputs->where('sisa_bulan', '=', 0)->first();
    //     // $filteredTabunganInputs = $filteredTabunganInputs->where('sisa_bulan', '>', 0)->get();

    //     // if(isset($cekSisaBulan)){
    //     //     // dd(isset($cekSisaBulan));
    //     //     return redirect()->route('history.index', ['id' => $id]);
    //     // }

    //      // Ambil semua tabungan inputs tanpa memfilter berdasarkan sisa_bulan
    //      $filteredTabunganInputs = $filteredTabunganInputs->get();

    //      // Evaluasi apakah data bisa diunduh berdasarkan sisa_pembayaran dan sisa_bulan
    //      $canDownload = $filteredTabunganInputs->every(function ($input) {
    //          return $input->tabunganKur->sisaPembayaran() == 0 && $input->sisa_bulan == 0;
    //      });

    //     return view('layouts.rincian', compact('tabungankur', 'produkList', 'filteredTabunganInputs'));
    // }

    public function show($id, Request $request)
    {
        // Mengambil data Tabungankur dan relasi produk
        $tabungankur = Tabungankur::with('produk')->findOrFail($id);
        $produkList = Produkhewan::all();

        // Mengambil data tabungan dengan relasi produk jika produk_id ada
        $produkId = $request->query('produk_id');
        $filteredTabunganInputs = TabunganInput::with('tabunganKur', 'tabunganKur.produk')
            ->where('tabungan_kur_id', $id);

        // Memfilter jika produk_id ada
        if ($produkId) {
            $filteredTabunganInputs = $filteredTabunganInputs->whereHas('tabunganKur.produk', function($query) use ($produkId) {
                $query->where('id', $produkId);
            });
        }

        // Ambil semua tabungan inputs tanpa memfilter berdasarkan sisa_bulan
        $filteredTabunganInputs = $filteredTabunganInputs->get();

        // Ambil data Tabungankur
        $tabunganKur = Tabungankur::with('produk')->findOrFail($id);
        // $tabunganKur = Tabungankur::with('metode', 'produk')->findOrFail($tabunganKurId);

        // Hitung sisa pembayaran yang sudah ada
        $sisaPembayaran = $tabunganKur->sisaPembayaran();
        $totalBayar = $request->total_bayar ?? 0;

        // Kurangi sisa pembayaran dengan total bayar saat ini
        $minusPembayaran = max($sisaPembayaran - $totalBayar, 0);

        // Kirim ke view
        return view('layouts.rincian', [
            'tabungankur' => $tabunganKur,
            'produkList' => $produkList,
            'filteredTabunganInputs' => $filteredTabunganInputs,
            'minusPembayaran' => $minusPembayaran,
        ]);
    }
}
