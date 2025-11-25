<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Admin - Cimahi Baik">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="{{ asset('assets/foto/logo.png') }}">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <!-- FontAwesome CDN -->

    <style>
        .input-group {
            position: relative;
        }

        .input-group .btn {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 2;
            background-color: transparent;
            color: black;
        }

        .floating-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            min-width: 250px;
            max-width: 400px;
        }
    </style>

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show floating-alert" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex flex-column align-content-end">
                        <div class="app-auth-body">
                            <div class="app-auth-branding mb-3">
                                <a class="app-logo">
                                    <img class="logo-icon me-2" src="{{ asset('assets/foto/logo.png') }}"
                                        alt="logo">

                                </a>
                            </div>

                            <div class="auth-form-container text-start">
                                <form class="auth-form login-form" action="/" method="post">
                                    @csrf
                                    <div class="email mb-3">
                                        <label class="sr-only" for="signin-email">Email</label>
                                        <input id="signin-email" name="email" type="email"
                                            class="form-control signin-email @error('email') is-invalid @enderror"
                                            placeholder="Email address"
                                            value="{{ old('email', request()->cookie('email')) }}" required="required">
                                        @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="password mb-2 input-group">
                                        <label class="sr-only" for="signin-password">Password</label>
                                        <input id="signin-password" name="password" type="password"
                                            class="form-control signin-password  @error('password') is-invalid @enderror"
                                            value="{{ old('password', request()->cookie('password')) }}"
                                            placeholder="Password" required="required">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye" id="toggleIcon"></i>
                                        </button>
                                        @error('password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="extra row justify-content-between mb-3">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="RememberPassword"
                                                    name="remember">
                                                <label class="form-check-label" for="RememberPassword">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="forgot-password text-end">
                                                <a href="#">Forgot password?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-login w-50 theme-btn mx-auto">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <footer class="app-auth-footer">
                            <div class="container text-center py-3"></div>
                        </footer>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="login-bg" src="{{ asset('assets/foto/login-bg.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#signin-password');
        const toggleIcon = document.querySelector('#toggleIcon');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle the eye slash icon
            toggleIcon.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                let alert = document.querySelector(".floating-alert");
                if (alert) {
                    alert.classList.add("fade");
                    setTimeout(() => alert.remove(), 500); // Hapus setelah efek fade
                }
            }, 4000); // 4 detik
        });
    </script>


    <!-- Bootstrap JS (Required for dismissable alerts) -->
    <!-- Bootstrap JS (Required for dismissable alerts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>
