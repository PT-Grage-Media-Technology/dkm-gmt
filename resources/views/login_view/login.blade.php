<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/15f35fc9f3.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/login/login.css') }}">
    <link rel="icon" href="{{asset('assets/components/logoApp/Logo Awan Laundry.png')}}" type="image/x-icon">
</head>

<body>
    <div class="container w-fit">
		<div class="right">
			<p class="judul1"><b>Rasakan Kenyataan laundry praktis kami!<br>Tingkatkan kualitas hidup Anda mulai hari ini.</b></p>
            <img src="{{ asset('assets/components/icon/kurir.png') }}" alt="">
        </div>
		<div class="batas">

		</div>
        <div class="login">
            @php
                $emailClass = $errors->has('email') ? 'text-red-700 border-red-500 bg-red-50' : '';
                $passClass = $errors->has('password') ? 'text-red-700 border-red-500 bg-red-50' : '';
            @endphp
            {{-- @if (Session::has('error'))
                <div class='alert alert-danger' role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif --}}
            <form action="{{ route('loginIndex') }}" method="POST" class="space-y-2">
                @csrf
                <div class="headFrm">
                    <h3>AWAN LAUNDRY EXPRESS</h3>
                    <p class="deskripsi">Selamat Datang di Awan Laundry <br>Silahkan Masuk Dengan Akun Anda</p>
                </div>
                <div class="inpEmail">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="example@gmail.com" class="inpField p-1 {{ $emailClass }}" style="background: #EDFAFF;" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $message)
                            <div class="errMess">
                                <span class="text-red-700 text-sm">
                                    <i class="fas fa-circle text-[0.5rem] mr-2"></i>
                                    {{ $message }}
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="inpPass">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" class="inpField p-1 {{ $passClass }}" style="background: #EDFAFF;" required>
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $message)
                            <div class="errMess">
                                <span class="text-red-700 text-sm">
                                    <i class="fas fa-circle text-[0.5rem] mr-2"></i>
                                    {{ $message }}
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if (Session::has('errorLogin'))
                    <span class="text-red-700 text-sm">
                        {{ Session::get('errorLogin') }}
                    </span>
                @endif
                <div class="forgetPass mt-4">
                    <a class="lupaPW" href="{{ route('forgot_password') }}">Lupa Password?</a>
                </div>
                <div class="submLog">
                    <button type="submit" class="bg-blue-400 p-[8px] bg-gradient-to-r from-[#0493CC] to-[#9FDCFF] hover:contrast-125">Login</button>
                </div>
                <div class="anotherMethod">
                    <p class="or-line"><span> atau masuk dengan</span></p>
                    <div class="button google">
                        <button>
                            <img src="{{ asset('assets/components/icon/google.png') }}" alt=""> Google
                        </button>
                    </div>
                </div>
                <div class="NoAccount">
                    <p class="daftar">Belum memiliki akun?
                        <a href="{{ route('registerIndex') }}">Daftar Sekarang</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src=""></script>
</body>

</html>
