<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabunganInput;
use Carbon\Carbon;

class DataPemasukanController extends Controller
{
    public function index(Request $request)
    {
        // Get the selected month from the request
        $selectedMonth = $request->query('month');

        // Fetch all TabunganInput records
        $tabungan_inputs = TabunganInput::all();

        // Calculate total income per month
        $monthlyPemasukan = $tabungan_inputs->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m'); // Ensure month is an integer
        })->map(function ($row) {
            return $row->sum('total_bayar');
        });

        // Generate a list of all months (1 to 12)
        $months = range(1, 12);

        // If a month is selected, get the pemasukan for that month, or set to 0 if no data
        $pemasukanForSelectedMonth = $selectedMonth ? ($monthlyPemasukan->get($selectedMonth) ?? 0) : null;
        

        // Pass data to the view
        return view('admin.datapemasukan', compact('monthlyPemasukan', 'months', 'selectedMonth', 'pemasukanForSelectedMonth'));
    }

    // Other methods...
}
