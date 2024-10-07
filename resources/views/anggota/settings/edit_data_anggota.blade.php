@extends('anggota.index')
@section('title', ' Edit Setting Akun Anggota')
@section('content')

        <div class="form-container">
            <div class="profile-anggota">
                @include('anggota.settings.edit_profile_anggota')
                {{-- <h2>Ubah Data Peserta</h2> --}}
            </div>
            <form action="{{ route('updateAkunAnggota') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" value="{{ $anggota->username }}" class="small-input" >
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" value="{{ $anggota->email }}" class="small-input" >
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="{{ $anggota->nama_lengkap }}" class="small-input" >
                </div>
                <div class="form-group">
                    <label for="no_telepon">No Telepon:</label>
                    <input type="text" id="no_telepon" name="no_telepon" placeholder="Masukkan No Telepon" value="{{ $anggota->no_telepon }}" class="small-input" >
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary" style="font-size: 14px;">Simpan</button>
                    <a href="{{ route('settingAkunAnggota') }}" class="btn btn-secondary" style="font-size: 14px;">Kembali</a>
                </div>
            </form>
        </div>
</div>
@endsection
