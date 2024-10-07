@extends('admin.layouts.main')

@section('title', 'Histori Data Transaksi')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Histori Data Transaksi</h1>

        @if ($dataTransaksi->count() == 0)
            <p>Tidak ada data transaksi untuk admin ini.</p>
            @php
                $transaksi = new \App\Models\DataTransaksi;
            @endphp
            <a href="{{ route('data-transaksi-create') }}" class="btn btn-primary">Tambah Data</a>
        @else
            @foreach ($dataTransaksi as $transaksi)
                <form>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="no_rekening">Nomor Rekening</label>
                        <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="{{ $transaksi->no_rekening }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_dana">Nomor Dana / OVO</label>
                        <input type="text" class="form-control" id="no_dana" name="no_dana" value="{{ $transaksi->no_dana }}" readonly>
                    </div>
                    <a href="{{ route('data-transaksi', $transaksi->id_dataTransaksi) }}" class="btn btn-primary">Edit</a>
                </form>
            @endforeach
        @endif
    </div>
@endsection
