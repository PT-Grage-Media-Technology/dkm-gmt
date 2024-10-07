<?php

namespace App\Http\Controllers\admin;

use App\Models\AlamatAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlamatAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alamat = AlamatAdmin::first();
        dd($alamat);
        return view('admin.alamatadmin', compact('alamat'));

    }

    // public function index()
    // {
    //     $admin_id = Auth::id();
    //     $alamat = AlamatAdmin::where('admin_id', $admin_id)->first();

    //     // Debugging
    //     dd($alamat); 

    //     return view('admin.alamatadmin', compact('alamat'));
    // }



    public function indexubah()
    {
        $alamat = AlamatAdmin::first();
        return view('admin.ubahalamatadmin', compact('alamat'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'id_alamatadmin' => 'nullable|exists:alamat_admin,id_alamatadmin',
            'alamat_lengkap' => 'nullable|string|max:255',
            'rt' => 'nullable|numeric',
            'rw' => 'nullable|numeric',
            'kelurahan' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
        ]);

        $data = $request->only([
            'alamat_lengkap',
            'rt',
            'rw',
            'kelurahan',
            'kabupaten',
            'kecamatan',
            'provinsi'
        ]);

        if ($request->filled('id_alamatadmin')) {
            $alamat = AlamatAdmin::findOrFail($request->input('id_alamatadmin'));
            $alamat->update($data);
            $message = 'Alamat berhasil diperbarui.';
        } else {
            $data['admin_id'] = Auth::id();
            AlamatAdmin::create($data);
            $message = 'Alamat berhasil ditambahkan.';
        }


        return redirect()->route('settingedit')->with('success', $message);
    }
    public function show($id)
    {
        $alamat = AlamatAdmin::findOrFail($id);
        return view('admin.alamatadmin', compact('alamat'));
    }
}