<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
</head>


<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <h3 class="card-title text-center">Reset Password</h3>
                        <p class="text-center">Masukkan Password Baru Anda Agar Bisa Mengaksesnya Lebih Lanjut </p>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                                <!-- Hidden field for token -->
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <label>Email <span class="login-danger"></span></label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ $email ?? old('email') }}" placeholder="Masukkan E-mail Address Anda">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>

                            <div class="form-group">
                                <label>New Password <span class="login-danger"></span></label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan Password Baru Anda">
                                <span class="profile-views feather-eye toggle-password"
                                    onclick="togglePasswordVisibility()"></span>
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password <span class="login-danger"></span></label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Konfirmasi Password Baru Anda">
                                <span class="profile-views"><i class="fas fa-lock"></i></span>
                            </div>

                            <div class="form-group mb-0">
                                <a href="{{ route('login') }}"
                                    class="btn btn-primary primary-reset btn-block">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("feather-eye");
                toggleIcon.classList.add("feather-eye-off");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("feather-eye-off");
                toggleIcon.classList.add("feather-eye");
            }
        }
    </script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

<!-- Mirrored from preschool.dreamstechnologies.com/template/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2024 16:06:33 GMT -->

</html>
