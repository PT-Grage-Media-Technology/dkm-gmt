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
        <form action="{{ route("register-index") }}" method="POST">
            @csrf
            <h3>Register</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Buat Akun</button>
        </form>
    </div>
</div>
<script src="path/to/noostrap.js"></script>
</body>
</html>
