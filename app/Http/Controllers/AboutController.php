<?php

namespace App\Http\Controllers;

use App\Models\InfoKoAdmin;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // $info = InfoKoAdmin::first();
        // return view('user.page.about', compact('info'));
        $info = InfoKoAdmin::first(); // Mengambil data pertama dari tabel
        // dd('coba');
        return view('user.pages.about', ['info' => $info]);
    }
}
