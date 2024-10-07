<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use Illuminate\Http\Request;
use App\Models\TabunganInput;
use Illuminate\Support\Facades\DB;

class TabunganInputsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('tabungan_inputs as t')
        ->join('users as u', 't.user_id', '=', 'u.id')
        ->select('u.username as Nama', 't.tanggal_bayar as Tanggal', 't.total_bayar as Nominal', 't.minus_pembayaran as Sisa_Pembayaran')
        ->get();

    return view('notifikasi.layouts', ['data' => $data]);
    }

    public function BuktiBayar()
    {
        $buktiBayar = BuktiPembayaran::with('tabunganInput')->get();
        return view('anggota.inputuser.buktibayar', compact('buktiBayar'));
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
