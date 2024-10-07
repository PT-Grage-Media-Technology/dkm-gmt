<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password Token</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login/lupaPW.css') }}">
    <link rel="icon" href="{{asset('assets/components/logoApp/Logo Awan Laundry.png')}}" type="image/x-icon">
</head>

<body>
    <div class="container">
		<div class="right">
			<p class="judul1">
				<b>Lupa password? Tenang saja!<br>
				Awan Laundry siap membantu Anda<br> mengatasinya dengan cepat dan mudah.
				</b>
			</p>
            <img src="{{ asset('assets/components/icon/kurir.png') }}" alt="">
        </div>
		<div class="batas"></div>
        <div class="lupaPW">
            <form action="{{ route('password.update') }}" method="POST">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif
                @csrf
				<h3>Lupa password?</h3>
				<p class="deskripsi">Masukkan password baru dan konfirmasinya</p>
                <input type="hidden" name="token" value="{{request()->token }}">
                <input type="hidden" name="email" value="{{request()->email }}">

                <div>
                    <label for="new_password">Password Baru</label>
                    <input type="password" name="password" id="new_password" placeholder="Masukkan Password Baru" style="background: #EDFAFF;">
                </div>
                <div>
                    <label for="confirm_password">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="confirm_password" placeholder="Ulangi Password Baru" style="background: #EDFAFF;">
                </div>
						<a class="bawah" href="{{ route('forgot_password') }}">Kembali</a>
				<button class="lanjutkan">Lanjutkan</button>
				{{-- <div class="bawah">
					<p>
						<a href="{{ route('forgot_password') }}">Kembali</a>
					</p>
				</div> --}}
            </form>
        </div>
    </div>
</body>

</html>
