@extends('admin.layouts.main')

@section('title', 'Edit Profile')

@section('content')
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
            <!-- Content -->
            <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="logo">Logo DKM</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    @if($setting->logo)
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo DKM" width="100">
                    @endif
                </div>

                <div class="form-group">
                    <label for="nama">Nama DKM</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $setting->nama }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $setting->alamat }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

@endsection