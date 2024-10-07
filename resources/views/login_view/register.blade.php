<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/15f35fc9f3.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/login/register.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/main/s.css')}}">
    <link rel="icon" href="{{asset('assets/components/logoApp/Logo Awan Laundry.png')}}" type="image/x-icon">
</head>
<body>
    <div class="container w-fit">
        <div class="right">
            <p class="judul1">
                <b>Bergabunglah dengan Awan Laundry sekarang!<br>
                Daftar untuk layanan laundry terbaik<br>
                Mulailah perjalanan kenyamanan Anda hari ini!
                </b>
            </p>
            <img src="{{ asset('assets/components/icon/kurir.png') }}" alt="">
        </div>
        <div class="batas"></div>
        <div class="register">
            {{-- @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif --}}
            @if (Session::has('somethingErr'))
                <div class="alertErr text-red-700">
                    {{ Session::get('somethingErr') }}
                </div>
            @endif
            @php
                $nameClass = $errors->has('name') ? 'text-red-700 border-red-500 bg-red-50' : '';
                $emailClass = $errors->has('email') ? 'text-red-700 border-red-500 bg-red-50' : '';
                $telpClass = $errors->has('telp') ? 'text-red-700 border-red-500 bg-red-50' : '';
                $passClass = $errors->has('password') ? 'text-red-700 border-red-500 bg-red-50' : '';
                $confPassClass = $errors->has('password_confirmation') ? 'text-red-700 border-red-500 bg-red-50' : '';
            @endphp
            <form action="{{ route('registerPost') }}" method="POST">
                @csrf
                <h3>Register</h3>
                <div class="inpNme">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan Nama Anda" class="inpField p-1 {{ $nameClass }}" style="background: #EDFAFF;" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $message)
                            <div class="errMess">
                                <span class="text-red-700 text-sm">
                                    <i class="fas fa-circle text-[0.5rem] mr-2"></i>
                                    {{ $message }}
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="inpEmail">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="example@gmail.com" class="inpField p-1 {{ $emailClass }}" style="background: #EDFAFF;" value="{{ old('email') }}" required>
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
                <div class="inpTelp">
                    <label for="telp">No Telpon</label>
                    <input type="number" name="telp" id="telp" placeholder="Masukkan No Telpon Anda" class="inpField p-1 {{ $telpClass }} hide-input-arrow" style="background: #EDFAFF;" value="{{ old('telp') }}" required>
                    @if ($errors->has('telp'))
                        @foreach ($errors->get('telp') as $message)
                            <div class="errMess">
                                <span class="text-red-700 text-sm">
                                    <i class="fas fa-circle text-[0.5rem] mr-2"></i>
                                    {{ $message }}
                                </span>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="inpPassNConf">
                    <div class="inpPass">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="inpField p-1 {{ $passClass }} inpPass" style="background: #EDFAFF;" required>
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
                    <div class="inpConfPass">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" class="inpField p-1 {{ $confPassClass }} inpConfPass" style="background: #EDFAFF;" required>
                        @if ($errors->has('password_confirmation'))
                            @foreach ($errors->get('password_confirmation') as $message)
                                <div class="errMess">
                                    <span class="text-red-700 text-sm">
                                        <i class="fas fa-circle text-[0.5rem] mr-2"></i>
                                        {{ $message }}
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="warnErr"></div>
                </div>
                <button type="submit" class="buat-akun">Buat Akun</button>
                <p class="already-have-account">Sudah memiliki akun?
                    <a href="{{ route('loginIndex') }}" class="" style="color: #D42A63; text-decoration: none;">Login</a>
                </p>
                <p class="or-line"><span>atau</span></p>
                <div class="button google">
                    <button type="button">
                        <img src="{{ asset('assets/components/icon/google.png') }}" alt="">Login dengan Google
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/LogReg/regs.js') }}"></script>
</body>
</html>
