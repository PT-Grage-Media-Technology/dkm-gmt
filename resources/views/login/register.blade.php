<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DKM Nurul Hidayah Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>
<body>
<div class="container"> 
    <div class="right">
        <img src="{{ asset('assets/images/kurban.png') }}" alt="Kurban Image">
    </div>
    <div class="batas"></div>
    <div class="register">
        <h3>Register</h3>
        <form action="{{route ('registerPost')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">email</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success" href="{{ route('loginIndex') }}">Buat Akun</button>
        </form>
    </div>
</div>
<script src="path/to/bootstrap.js"></script>
</body>
</html>
