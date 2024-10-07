<?php

namespace App\Http\Controllers\admin;

use App\Models\InfoKoAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakAdminController extends Controller
{
    public function index()
    {
        $setting = InfoKoAdmin::first();
        return view('admin.kontakadmin', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'wa' => 'required|string|max:15',
            'maps' => 'required',
        ]);

        $setting = InfoKoAdmin::first();
        
        if ($setting) {
            $setting->update($request->only('email', 'wa', 'maps'));
        } else {
            InfoKoAdmin::create($request->only('email', 'wa', 'maps'));
        }

        return redirect()->route('kontakadmin.index')->with('success', 'Data kontak admin berhasil disimpan.');
    }

}
