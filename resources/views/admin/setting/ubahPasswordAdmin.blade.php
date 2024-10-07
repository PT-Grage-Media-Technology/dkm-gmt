@extends('admin.layouts.main')
@section('title', 'Ubah Password Admin')
@section('content')

    <div class="profile" id="ubah-password">
        <div class="profile-and-form">
            <div class="form-container">
                <div class="form-header-ubahPW">
                    <h4 class="h3 mb-4 text-gray-800">Ubah Password Admin</h4>
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

                <form method="POST" action="{{ route('admin.setting.ubahPasswordAdmin') }}" class="w-100">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="password-lama">Password Lama</label>
                        <input type="password" id="password-lama" name="password_lama_admin" placeholder="Masukkan password lama" class="form-control input-pw" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password-baru">Password Baru</label>
                        <input type="password" id="password-baru" name="password_baru_admin" placeholder="Masukkan password baru" class="form-control input-pw" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="konfirmasi-password">Konfirmasi Password</label>
                        <input type="password" id="konfirmasi-password" name="password_baru_admin_confirmation" placeholder="Konfirmasi password baru" class="form-control input-pw" required>
                    </div>
                    <div class="form-buttons text-end">
                        <button type="submit" class="btn btn-primary" style="font-size: 14px;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
