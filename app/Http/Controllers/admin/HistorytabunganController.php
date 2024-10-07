<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Metode;
use App\Models\Anggota;
use App\Models\produkhewan;
use App\Models\Tabungankur;
use App\Models\Produkhewan1;
use Illuminate\Http\Request;
use App\Models\TabunganInput;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryTabunganController extends Controller
{
    public function index(){
        $anggotaId = Auth::guard('anggota')->id();

        $users = User::whereHas('tabungankur', function ($query) {
            $query->where('status_persetujuan', 'Disetujui');
        })->whereNotNull('anggota_id')->get();

            $anggotas = Anggota::all();
            $uniqueProduk = produkhewan::all();
            $metodeList = Metode::all();
        
        $historiTabungan = TabunganInput::with(['user.anggota', 'tabunganKur.produk', 'tabunganKur.metode'])
        ->whereHas('tabunganKur', function ($query) {
            $query->where('status_persetujuan', 'Disetujui');
        })->get();
    // dd($historiTabungan);
        return view('admin.historitabungan', compact('users', 'uniqueProduk', 'metodeList', 'anggotas','historiTabungan'));
    }

    public function downloadData($id)
    {
        $tabungan = TabunganInput::with(['user.anggota', 'tabunganKur.produk', 'tabunganKur.metode'])
                        ->where('id_tabunganinputs', $id)->first();
    
        $data = [
            ['Nama Anggota', $tabungan->user->anggota->nama_lengkap],
            ['Nama Penabung', $tabungan->user->nama_lengkap],
            ['Metode', $tabungan->tabunganKur->metode->jenis],
            ['Tabungan', $tabungan->tabunganKur->produk->name],
            ['Sisa Pembayaran', $tabungan->tabunganKur->sisaPembayaran()],
            ['Sisa Bulan', $tabungan->sisa_bulan],
            ['Rincian Tanggal Bayar', $tabungan->rincian_tanggal_bayar],
            ['Total Bayar', $tabungan->total_bayar],
        ];
    
        $fileName = 'tabungan_' . $tabungan->id . '.csv';
        $filePath = storage_path('app/public/' . $fileName);
        $file = fopen($filePath, 'w');
    
        foreach ($data as $row) {
            fputcsv($file, $row);
        }
    
        fclose($file);
    
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    

}