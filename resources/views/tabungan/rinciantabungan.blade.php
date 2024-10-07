<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Tabungan</title>
    <link href="{{ asset('css/tentang.css') }}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/input.css') }}">
    <style> 
        .about-title {color: green;}
        .info-box {background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        .info-box h3 {color: #333;}
        .info-box p {color: #555;}
    </style>
</head>
<body>
    @extends('layouts.master')
    @include('includes.nav')
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <h4>Rincian Tabungan :</h4>
        
        @forelse($tabungankur as $index => $tabungan)
            <!-- Dynamic Container for each tabungan -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="info-box p-4">
                        <h5>Rincian Tabungan {{ $index + 1 }}</h5>
                        <p>Awal Waktu Tabungan: {{ $tabungan->awal_waktu_tabungan }}</p>
                        <p>Target Waktu Tabungan: {{ $tabungan->target_waktu_tabungan }}</p>
                        <p>Jumlah Cicilan/Bulan: {{ $tabungan->jumlah_cicilan_bulan }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada data tabungan yang ditemukan.</p>
        @endforelse
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
