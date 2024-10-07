<div class="profile" id="ubah-password">
    <div class="profile-and-form">
        <div class="form-container">
            <div class="form-header-ubahPW">
                <h2>Ubah Password</h2>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form id="form-ubah-password" action="{{ route('ubah.password') }}" method="POST">
                @csrf
                <label for="password-lama">Password Lama</label>
                <input type="password" id="password-lama" name="password_lama" placeholder="Masukkan password lama">
                <label for="password-baru">Password Baru</label>
                <input type="password" id="password-baru" name="password_baru" placeholder="Masukkan password baru">
                <label for="konfirmasi-password">Konfirmasi Password</label>
                <input type="password" id="konfirmasi-password" name="password_baru_confirmation" placeholder="Konfirmasi password baru">
                <button type="submit" id="btn-simpan-password">Simpan</button>
            </form>
        </div>
    </div>
</div>
