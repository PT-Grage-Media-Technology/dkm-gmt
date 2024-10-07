<?php

namespace App\Http\Controllers;

use App\Models\TabelGambarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TabelGambarController extends Controller
{
    public function edit()
    {
        $setting = TabelGambarModel::first();
        return view('admin.informasi.edit', compact('settingInfo'));
    }
}

