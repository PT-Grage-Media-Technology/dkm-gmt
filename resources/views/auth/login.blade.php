<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DKM Nurul Hidayah Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body style="background-image: url('{{ asset('image/masjid1.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-card">
            <h2 class="text-center">Login Penabung</h2>
            <h5 class="text-center">Silahkan Masukkan Akun Anda</h5>
            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif
            <form class="form" method="post" action="{{ route('login-post') }}">
                {{-- @method('POST') --}}
                @csrf

                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                    <label>Username <span class="login-danger"></span></label>
                    <input type="text" name="username"
                        class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('Username') }}" value="{{ old('username') }}">
                    @include('alerts.feedback', ['field' => 'username'])
                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>Password <span class="login-danger"></span></label>
                    <input type="password" placeholder="{{ __('Password') }}" name="password"
                        class="form-control pass-input{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        value="{{ old('password') }}">
                    @include('alerts.feedback', ['field' => 'password'])
                    <span class="profile-views feather-eye toggle-password"></span>
                </div>

                <div class="forgotpass">
                    <a href="{{ route('password.request') }}">Lupa Password?</a>
                </div>
                {{-- <button type="submit" class="btn btn-success">Login</button> --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" >Login</button>
                </div>
                <div class="form-group daftar">
                    <p>Belum memiliki akun? <a href="{{ route('register-index') }}" class="text-primary">Daftar Sekarang</a></p>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>






