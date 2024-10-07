<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indabar;

class IndabarController extends Controller
{
    public function index()
    {
        $indabar = Indabar::all();
        return view('admin.indabar', compact('indabar'));
    }

    public function create()
    {
        return view('admin.indabar');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rincian_tanggal_bayar' => 'required|date',
            'total_bayar' => 'required|integer',
            'minus_pembayaran' => 'required|integer',
        ]);

        Indabar::create($data);

        return redirect()->route('indabar.index');
    }

    public function show($id)
    {
        $indabar = Indabar::findOrFail($id);
        return view('admin.indabar', compact('indabar'));
    }

    public function edit($id)
    {
        $indabar = Indabar::findOrFail($id);
        return view('admin.indabar', compact('indabar'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'rincian_tanggal_bayar' => 'required|date',
            'total_bayar' => 'required|integer',
            'minus_pembayaran' => 'required|integer',
            'nama_admin' => 'required|string',
        ]);

        $indabar = Indabar::findOrFail($id);
        $indabar->update($data);

        return redirect()->route('indabar.index');
    }

    public function destroy($id)
    {
        $indabar = Indabar::findOrFail($id);
        $indabar->delete();

        return redirect()->route('indabar.index');
    }
}
