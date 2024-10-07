@extends('anggota.index')
@section('title', 'Setting Password Anggota')
@section('content')

    <div class="profile" id="ubah-password">
        <div class="profile-and-form">
            <div class="form-container">
                <div class="form-header-ubahPW">
                    <h4>Ubah Password</h4>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('ubahPasswordAnggota') }}">
                    @csrf
                    <div class="form-group">
                        <label for="password-lama">Password Lama</label>
                        <input type="password" id="password-lama" name="password_lama_anggota" placeholder="Masukkan password lama" class="input-pw" required>
                    </div>
                    <div class="form-group">
                        <label for="password-baru">Password Baru</label>
                        <input type="password" id="password-baru" name="password_baru_anggota" placeholder="Masukkan password baru" class="input-pw" required>
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi-password">Konfirmasi Password</label>
                        <input type="password" id="konfirmasi-password" name="password_baru_anggota_confirmation" placeholder="Konfirmasi password baru" class="input-pw" required>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary" style="font-size: 14px;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
