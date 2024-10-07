<?php

namespace App\Http\Controllers;

use App\Models\produkhewan;
use App\Models\Tabungankur;
use Illuminate\Http\Request;
use App\Models\TabunganInput;

class HistoryController extends Controller
{
    public function index($id)
    {

        // Mengambil data Tabungankur dan relasi produk
        $tabungankur = Tabungankur::with('produk')->findOrFail($id);
        $produkList =  produkhewan::all();


        // Mengambil data tabungan dengan relasi produk jika produk_id ada
        $produkId = request()->query('produk_id');
        $filteredTabunganInputs = TabunganInput::with('tabunganKur', 'tabunganKur.produk') // Memuat relasi 'tabunganKur' dan 'tabunganKur.produk'
            ->where('tabungan_kur_id', $id);

        // Memfilter jika produk_id ada
        if ($produkId) {
            $filteredTabunganInputs = $filteredTabunganInputs->whereHas('tabunganKur.produk', function($query) use ($produkId) {
                $query->where('id', $produkId);
            });
        }

        $filteredTabunganInputs = $filteredTabunganInputs->get();


        return view('layouts.history', compact('tabungankur', 'produkList', 'filteredTabunganInputs'));
    }
}
