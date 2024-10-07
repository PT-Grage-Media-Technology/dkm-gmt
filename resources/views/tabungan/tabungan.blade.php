<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Tabungan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/input.css') }}">
</head>
<body>
    @extends('layouts.master')
    @include('includes.nav')

    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="text-left custom-background p-2">Input Data Tabungan</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/images/sapi limosin..jpg')}}" alt="Sapi Limosin" class="img-fluid">
                <p><b>Sapi Limosin</b></p>
                <p>34.000.000/Ekor</p>
                <p>Berat: 1 Ton</p>
            </div>
            @php
            // Misalkan Anda memiliki model Tabungankur
            use App\Models\Tabungankur;

            // Ambil semua data dari model Tabungankur
            $tabungankurs = Tabungankur::all();
            @endphp
            <div class="col-md-6">
                <div class="bg-light-green p-4 rounded">
                    <form>
                        <div class="form-group">
                            <label for="awalWaktuTabungan">Awal Waktu Tabungan</label>
                            <input type="date" id="awal_waktu_tabungan" name="awal_waktu_tabungan" class="form-control" value="{{  $tabungankur->awal_waktu_tabungan }}" required >
                        </div>
                        <div class="form-group">
                            <label for="targetWaktuTabungan">Target Waktu Tabungan</label>
                            <select id="target_waktu_tabungan" name="target_waktu_tabungan" class="form-control" required>
                                <option value="">Pilih Target Waktu</option>
                                @foreach ($tabungankurData as $tabungankur)
                                    <option value="{{ $tabungankur->target_waktu_tabungan }}">{{ $tabungankur->target_waktu_tabungan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlahCicilan">Jumlah Cicilan/Bulan</label>
                            <input type="text" id="jumlah_cicilan_bulan" name="jumlah_cicilan_bulan" class="form-control" value="{{  $tabungankur->jumlah_cicilan_bulan }}" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
