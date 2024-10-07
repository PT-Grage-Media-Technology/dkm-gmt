<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembagianAdminController extends Controller
{
    public function index()
    {
        // Mengambil data user dengan relasi anggota dan alamat
        // $users = User::with(['anggota', 'alamat'])->get();
        $anggotaList = Anggota::with(['users', 'users.alamat'])->get();

        return view('admin.pembin', compact('anggotaList'));
    }
}
