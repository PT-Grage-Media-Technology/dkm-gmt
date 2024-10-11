@extends('admin.layouts.main')
@section('title', 'Setting User pada Admin')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="form-container">
        <form action="{{ route('setadusr.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-center profil-ubah">
                @php
                    $setadusrset = App\Models\Setadusrset::first();
                @endphp
                @if($setadusrset && $setadusrset->logo)
                    <img id="profileImage" src="{{ asset('storage/' . $setadusrset->logo . '?' . time()) }}" alt="Logo" class="img-profile" style="max-width: 150px; height: auto;">
                @else
                    <img id="current-profile-image" src="{{ 'assets/qurban.png' }}" alt="Default Logo" class="profile-picture" style="max-width: 150px; height: auto;">
                @endif
                <!-- Input file di bawah gambar -->
                <div class="mt-3">
                    <input type="file" class="form-group text-center" id="logo" name="logo" onchange="previewImage(event)">
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama DKM</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $setadusrset->nama ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
        </form>
    </div>
</div>
@endsection
