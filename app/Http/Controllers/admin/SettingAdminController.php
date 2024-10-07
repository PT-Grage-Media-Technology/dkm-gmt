<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lomin;
use App\Models\SettingAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingAdminController extends Controller
{
    public function index()
    {
        $setting = Lomin::first(); // Mengambil data pertama dari model Lomin
        return view('admin.profileadmin', compact('setting')); // Mengirim data ke view
    }

    public function indexedit()
    {
        $setting = Lomin::first();
        return view('admin.settingadmin', compact('setting'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
        ]);

        $setting = Lomin::firstOrNew(['id_admin' => 1]);
        $setting->nama_lengkap = $request->input('nama');

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::delete('public/logo' . $setting->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $setting->logo = $path;
        }

        $setting->save();

        return redirect()->route('settingadmin')->with('success', 'Settings updated successfully.');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
        ]);

        $setting = Lomin::findOrFail($id);
        $setting->nama_lengkap = $request->input('nama');

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::delete('public/' . $setting->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $setting->logo = $path;
        }

        $setting->save();

        return redirect()->route('settingadmin')->with('success', 'Settings updated successfully.');
    }
}
