<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lomin.css') }}">
</head>
<body style="background-image: url('{{ asset('image/masjid2.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-card">
            <h2 class="text-center">Login Admin</h2>
            <h5 class="text-center">Silahkan Masukkan Akun Anda</h5>
            <form class="form" method="post" action="{{ route('lomin-post') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group lupaPW">
                    <a href="" class="text-danger">Resset Password?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                {{-- <div class="form-group daftar">
                    <p>Belum memiliki akun? <a href="{{ route('registeradmin') }}" class="text-primary">Daftar Sekarang</a></p>
                </div> --}}
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
