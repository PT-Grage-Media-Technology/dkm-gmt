<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tabunganController extends Controller
{
    public function index()
    {
        return view('tabungan');
    }
}
