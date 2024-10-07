@extends('anggota.index')
@section('title', 'Setting Akun Anggota')
@section('content')

<div class="form-container">
    <div class="profile-anggota">
        <div class="cImg">
            @if(Auth::guard('anggota')->user()->profile_anggota)
                <img id="profileImage" src="{{ asset('storage/profile_anggota/' . Auth::guard('anggota')->user()->profile_anggota . '?' . time()) }}" alt="Profile Image" class="object-cover object-center">
            @else
                <img id="current-profile-image" src="{{ asset('image/profil.png') }}" alt="Profile Picture" class="profile-picture">
            @endif
        </div>
        <h2>{{ Auth::guard('anggota')->user()->nama_lengkap }}</h2>
    </div>
    <div class="form-header">
        <a href="{{ route('editAkunAnggota') }}" id="edit-data-link" class="edit-link">Ubah <img src="{{ asset('image/pencil.png') }}" alt="Edit" class="edit-icon small-icon"></a>
    </div>
    <form>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Tambahkan Username" value="{{ Auth::guard('anggota')->user()->username }}" class="small-input" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Tambahkan Email" value="{{ Auth::guard('anggota')->user()->email }}" class="small-input" disabled>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Tambahkan Nama Lengkap" value="{{ Auth::guard('anggota')->user()->nama_lengkap }}" class="small-input" disabled>
        </div>
        <div class="form-group">
            <label for="no_telepon">No Telepon:</label>
            <input type="text" id="no_telepon" name="no_telepon" placeholder="Tambahkan No Telepon" value="{{ Auth::guard('anggota')->user()->no_telepon }}" class="small-input" disabled>
        </div>
    </form>
</div>
@endsection
