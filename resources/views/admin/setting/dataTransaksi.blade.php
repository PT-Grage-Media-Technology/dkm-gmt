@extends('admin.layouts.main')

@section('title', 'Data Transaksi')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <style>
            /* Menghilangkan Panah di Tabel Input */
            input[type=number]::-webkit-outer-spin-button,
            input[type=number]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            /* Hapus tanda panah di input number pada Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>

        <form action="{{ $dataTransaksi ? route('data-transaksi-update', $dataTransaksi->id_dataTransaksi) : route('data-transaksi-store') }}" method="POST">
            @csrf
            @if ($dataTransaksi)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="no_rekening">Nomor Rekening</label>
                <input type="number" class="form-control" id="no_rekening" name="no_rekening" value="{{ $dataTransaksi ? $dataTransaksi->no_rekening : '' }}" required>
            </div>
            <div class="form-group">
                <label for="no_dana">Nomor Dana / OVO</label>
                <input type="number" class="form-control" id="no_dana" name="no_dana" value="{{ $dataTransaksi ? $dataTransaksi->no_dana : '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('data-transaksi-histori') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
