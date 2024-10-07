@extends('admin.layouts.main')
@section('title', 'Tambah Metode Pembayaran')
@section('content')

<div class="container">
    <div class="row mt-4">
        <div class="col">
            <h2>Tambah Metode Pembayaran</h2>

            <!-- Form for Adding Method -->
            <form action="{{ route('metode.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis_metode">Jenis Metode Pembayaran:</label>
                    <input type="text" class="form-control" id="jenis_metode" name="jenis_metode" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Tambah Metode</button>
                <a href="{{ route('metode.indexTadamet') }}" class="btn btn-secondary mt-2">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection
