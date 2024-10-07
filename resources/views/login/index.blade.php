<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DKM Nurul Hidayah Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
<div class="container">
    <div class="right">
        <img src="{{ asset('assets/images/kurban.png') }}" alt="">
    </div>
    <div class="batas"></div>
    <div class="login">
        <form action="{{route ('loginIndex')}}" method="POST">
            <h3>Login</h3>
            <h2>Selamat Datang di DKM Nurul Hidayah Silahkan Masuk Ke Akun Anda</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group lupaPW">
                <a href="forgot_password.php" class="text-danger">Lupa Password?</a>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
           
            <div class="form-group daftar">
                <p>Belum memiliki akun? <a href="register" class="text-primary">Daftar Sekarang</a></p>
            </div>
        </form>
    </div>
</div>
<script src="path/to/noostrap.js"></script>
</body>
</html>
