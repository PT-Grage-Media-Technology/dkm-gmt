<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Anggota;
use App\Models\TabunganInput;
use App\Models\produkhewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $anggotas = Anggota::all();
    //     $user = User::all();
    //     $tabungan_inputs = TabunganInput::with('tabunganKur.produk')->get();
    //     // $tabungan_inputs = TabunganInput::with('produkhewan1')->get();
    //     $produkhewan1 = produkhewan::all();
    //     // dd($tabungan_inputs);
    //     return view('admin.home', compact('user','anggotas','tabungan_inputs','produkhewan1'));
    // }

    public function index()
    {
        $anggotas = Anggota::all();
        $users = User::all();
        $produkhewan1 = produkhewan::all();
        $currentMonth = now()->month; // Mendapatkan bulan saat ini

        // Mengambil semua data tabungan
        $tabungan_inputs = TabunganInput::with('tabunganKur.produk')->get();

        // Array untuk menyimpan total pembayaran per kombinasi pengguna dan hewan
        $payments = [];

        foreach ($tabungan_inputs as $t) {
            $userName = $t->user ? $t->user->nama_lengkap : 'Tidak Diketahui';
            $animalName = $t->tabunganKur && $t->tabunganKur->produk ? $t->tabunganKur->produk->name : 'Tidak Diketahui';
            $uniqueKey = $userName . '-' . $animalName; // Kombinasi unik nama pengguna dan nama hewan

            // Hitung total pembayaran untuk kombinasi ini pada bulan ini
            if ($t->tabunganKur && !isset($payments[$uniqueKey])) {
                $totalPaymentsThisMonth = TabunganInput::where('user_id', $t->user_id)
                    ->where('tabungan_kur_id', $t->tabunganKur->id)
                    ->whereMonth('created_at', $currentMonth)
                    ->sum('total_bayar');

                // Simpan hasil pembayaran dalam array
                $payments[$uniqueKey] = $totalPaymentsThisMonth;
            }
        }

        $totalPaymentsOverall = array_sum($payments);

        $produkHewanCount = produkhewan::count();

        $anggotaCount = Anggota::count();

        $userCount = User::count();


        $chartData = [
            'totalPaymentsPerMonth' => [], // Array untuk menyimpan data pembayaran per bulan
            'userCountsPerMonth' => [],    // Array untuk menyimpan jumlah pengguna per bulan
        ];

        // Contoh untuk total pembayaran per bulan
        for ($month = 1; $month <= 12; $month++) {
            $totalPayments = TabunganInput::whereMonth('created_at', $month)->sum('total_bayar');
            $chartData['totalPaymentsPerMonth'][] = $totalPayments;

            $userCounts = User::whereMonth('created_at', $month)->count();
            $chartData['userCountsPerMonth'][] = $userCounts;
        }

        return view('admin.home', compact(
            'users', 'anggotas', 'tabungan_inputs', 'produkhewan1',
            'payments', 'totalPaymentsOverall', 'produkHewanCount',
            'anggotaCount', 'userCount', 'chartData'
        ));
    }


    // public function showadmin()
    // {
    //     $anggota = User::all(); // Assuming 'User' is your model for users
    //     return view('admin.home', compact('anggotas'));
    // }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
