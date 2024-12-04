<?php

namespace App\Http\Controllers;
use App\Models\produkhewan;
use App\Models\Produk;
use App\Models\Tabungankur;
use App\Models\TabunganInput;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class notifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil Tabungankur berdasarkan user_id
        $tabungankur = Tabungankur::where('user_id', auth()->id())->with('produk', 'user', 'metode')->get();

        // Mengambil data TabunganInput berdasarkan user_id yang sedang login
        $tabunganInputs = TabunganInput::where('user_id', auth()->id())
            ->with('tabunganKur.produk')->get();


        // dd($tabungankur);
        if (!$tabungankur) {
            // Redirect atau kirim pesan error, sesuai kebutuhan aplikasi
            return redirect()->route('home')->with('error', 'Data tabungan tidak ditemukan.');
        }

            return view('layouts.notifikasi', compact('tabungankur', 'tabunganInputs'));
    }

        public function rincian(Request $request)
    {
        $produkList = produkhewan::all();
        $userId = Auth::id();
        $produkId = $request->input('produk_id');

        // Fetch data from Tabungankur
        $tabungankurQuery = Tabungankur::where('user_id', $userId)
            ->with(['produk', 'metode']); // Include necessary relationships

        if ($produkId) {
            $tabungankurQuery->where('produk_id', $produkId);
        }

        $tabungankur = $tabungankurQuery->get();

        // Delete Tabungankur with status 'Tidak Disetujui' older than one day
        $deletedCount = Tabungankur::where('status_persetujuan', 'Tidak Disetujui')
            ->where('created_at', '<', now()->subDay())
            ->delete();

        // Filter TabunganInput where sisa_bulan is 0
        $tabunganKurIdsToRemove = TabunganInput::whereIn('tabungan_kur_id', $tabungankur->pluck('id'))
            ->where('sisa_bulan', '=', 0)
            ->pluck('tabungan_kur_id')
            ->toArray();

        // Remove Tabungankur where id exists in $tabunganKurIdsToRemove
        $filteredTabunganKur = $tabungankur->filter(function ($item) use ($tabunganKurIdsToRemove) {
            return !in_array($item->id, $tabunganKurIdsToRemove);
        });

        return view('layouts.notifikasi', [
            'produkList' => $produkList,
            'filteredTabunganInputs' => $filteredTabunganKur, // Pass the filtered data to the view
            'tabungankur' => $filteredTabunganKur
        ]);
    }

    public function rincianHistory(Request $request)
    {
        $userId = Auth::id();
        $produkId = $request->input('produk_id');

        // Ambil semua produk yang terkait dengan tabungan_kur yang memiliki sisa_bulan = 0
        $produkList = produkhewan::whereIn('id', function($query) use ($userId) {
            $query->select('produk_id')
                ->from('tabungankurs')
                ->where('user_id', $userId)
                ->whereIn('id', function($subquery) {
                    $subquery->select('tabungan_kur_id')
                        ->from('tabungan_inputs')
                        ->where('sisa_bulan', '=', 0);
                });
        })->get();

        // Fetch Tabungankur data with similar logic
        $tabungankurQuery = Tabungankur::where('user_id', $userId)
            ->with(['produk', 'metode']); // Sertakan relasi yang diperlukan

        if ($produkId) {
            $tabungankurQuery->where('produk_id', $produkId);
        }

        $tabungankur = $tabungankurQuery->get();

        // Filter TabunganInput with sisa_bulan = 0
        $tabunganKurIdsWithZeroSisaBulan = TabunganInput::whereIn('tabungan_kur_id', $tabungankur->pluck('id'))
            ->where('sisa_bulan', '=', 0)
            ->pluck('tabungan_kur_id')
            ->toArray();

        $filteredTabunganKur = $tabungankur->filter(function ($item) use ($tabunganKurIdsWithZeroSisaBulan) {
            return in_array($item->id, $tabunganKurIdsWithZeroSisaBulan);
        });

        return view('layouts.history', [
            'produkList' => $produkList, // Hanya produk yang memiliki sisa_bulan = 0
            'filteredTabunganInputs' => $filteredTabunganKur,
            'tabungankur' => $filteredTabunganKur
        ]);
    }

}
