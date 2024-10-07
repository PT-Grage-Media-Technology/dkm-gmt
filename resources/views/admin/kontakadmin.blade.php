@extends('admin.layouts.main')

@section('title', 'Kontak Admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Kontak Admin</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('kontakadmin.store') }}" method="POST">
            @csrf
         @php
               $setting = App\Models\InfoKoAdmin::first();
         @endphp
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $setting->email ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="wa">WhatsApp (Contoh : 62xxxxx)</label>
                <input type="tel" class="form-control" id="wa" name="wa" value="{{ $setting->wa ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="maps">Maps</label>
                <textarea class="form-control" id="maps" name="maps" rows="4" required>{{ $setting->maps ?? ''}}</textarea>
            </div>
            <div class="mt-4 p-3 border border-secondary rounded bg-light text-danger">
                <h5>NOTE</h5>
                <h7>Link maps diambil dari web Google Maps.</h7>
                <p>Cari lokasi -> Bagikan -> Salin HTML -> Salin link http dalam src nya saja.</p>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
