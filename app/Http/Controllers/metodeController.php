<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metode;

class metodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metode = Metode::all();
        return view('admin.damet', compact('metode'));
    }

    public function indexTadamet(){
        $metode = Metode::all();
        return view('admin.tadamet', compact('metode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_metode' => 'required|string|max:255',
        ]);

        Metode::create([
            'jenis' => $request->jenis_metode,
        ]);

        return redirect()->route('metode.indexTadamet')->with('success', 'Metode pembayaran berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_metode' => 'required|string|max:255',
        ]);

        $metode = Metode::findOrFail($id);
        $metode->update([
            'jenis' => $request->jenis_metode,
        ]);

        return redirect()->route('metode.indexTadamet')->with('success', 'Metode pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $metode = Metode::findOrFail($id);
        $metode->delete();

        return redirect()->route('metode.indexTadamet')->with('success', 'Metode pembayaran berhasil dihapus.');
    }

    public function damet()
    {
        return view('admin.damet');
    }


    // Other methods...
}

