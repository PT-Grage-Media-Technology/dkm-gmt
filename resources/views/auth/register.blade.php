<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DKM Nurul Hidayah Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body style="background-image: url('{{ asset('image/masjid1.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-card">
            <h2 class="text-center">Register Penabung</h2>
            <h5 class="text-center">Silahkan Buat Akun Anda</h5>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @endif
            <form class="form" method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                    <label>Username <span class="login-danger"></span></label>
                    <input type="text" name="username"
                        class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('Username') }}" value="{{ old('username') }}">
                    @include('alerts.feedback', ['field' => 'username'])
                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label>Email <span class="login-danger"></span></label>
                    <input type="email" name="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('Email') }}" value="{{ old('email') }}">
                    @include('alerts.feedback', ['field' => 'email'])
                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label>Nama Lengkao <span class="login-danger"></span></label>
                    <input type="text" name="nama_lengkap"
                        class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('Nama Lengkap') }}" value="{{ old('nama_lengkap') }}">
                    @include('alerts.feedback', ['field' => 'nama_lengkap'])
                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label>No Telepon <span class="login-danger"></span></label>
                    <input type="text" name="no_telepon"
                        class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('No Telepon / Whatsapp Aktif') }}" value="{{ old('no_telepon') }}">
                    @include('alerts.feedback', ['field' => 'no_telepon'])
                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>Password <span class="login-danger"></span></label>
                    <input type="password" placeholder="{{ __('Password') }}" name="password"
                        class="form-control pass-input{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        value="{{ old('password') }}">
                    @include('alerts.feedback', ['field' => 'password'])
                    <span class="profile-views feather-eye toggle-password"></span>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <label>Konfirmasi Password <span class="login-danger"></span></label>
                    <input type="password" placeholder="{{ __('Konfirmasi Password') }}" name="password_confirmation"
                        class="form-control pass-input{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                        value="{{ old('password_confirmation') }}">
                    @include('alerts.feedback', ['field' => 'password_confirmation'])
                    <span class="profile-views feather-eye toggle-password"></span>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Buat Akun</button>
                </div>
                <div class="form-group daftar">
                    <p>Sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary">Kembali ke Login</a></p>
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
