<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InfoKoAdmin;

class InformasiController extends Controller
{
    public function indexAdmin(){
        return view('admin.informasiadmin.edit');
    }

    public function index(){
        $ubah = InfoKoAdmin::first();

        return view('admin.informasiadmin.index', compact('ubah'));
    }


    public function edit()
    {
        $settingg = InfoKoAdmin::first();
        if (!$settingg) {
            $settingg = new InfoKoAdmin();
        }

        if (!view()->exists('admin.informasiadmin.edit')) {
            abort(404, 'View file does not exist.');
        }

        return view('admin.informasiadmin.edit', compact('settingg'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $setting = InfoKoAdmin::first();
        if (!$setting) {
            $setting = new InfoKoAdmin();
        }

        $setting->description = $request->input('description');
        $setting->save();

        return redirect()->route('info.index')->with('success', 'Information updated successfully.');
    }
}
