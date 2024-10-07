<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
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
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
				<h3>Lupa password?</h3>
				<p class="deskripsi">Masukkan email Anda dan kami akan<br>
					mengirimkan tautan untuk kembali ke akun Anda</p>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="example@gmail.com" style="background: #EDFAFF;">
				<button class="lanjutkan">Lanjutkan</button>
				<div class="bawah">
					<p>Belum memiliki akun?
						<a href="{{ route('registerIndex') }}">Daftar Sekarang</a>
					</p>
				</div>
            </form>
        </div>
    </div>
</body>

</html>
