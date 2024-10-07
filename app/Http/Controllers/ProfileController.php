<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lomin;

class SettingAdminController extends Controller
{
    public function index()
    {
        $admin = Lomin::where('email', 'admin@example.com')->first(); // Mengambil data admin dari tabel Lomin
        return view('admin.settingadmin', compact('admin'));
    }

    public function edit()
    {
        $admin = Lomin::where('email', 'admin@example.com')->first(); // Mengambil data admin dari tabel Lomin
        return view('admin.settingadmin_edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Lomin::where('email', 'admin@example.com')->first(); // Mengambil data admin dari tabel Lomin
        $admin->update($request->all());
        return redirect()->route('settingadmin')->with('success', 'Settings updated successfully.');
    }
}
