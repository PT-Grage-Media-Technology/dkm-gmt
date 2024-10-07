<?php

namespace App\Http\Controllers;
use App\Models\produkhewan;
use Illuminate\Http\Request;

class searchprodukController extends Controller
{
    public function searchproduk(Request $request)
{
    $search = $request->input('search');
    $produkhewan = produkhewan::where('name', 'LIKE', "%$search%")->get();

    return view('layouts.produk', compact('produkhewan', 'search'));
}

}
