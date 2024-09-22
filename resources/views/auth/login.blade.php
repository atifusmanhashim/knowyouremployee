<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Know Your Employee - Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('knowyouremployee.ico') }}" type="image/x-icon"/>
    <style>
        body, html {
            height: 100%;
        }
        .login-container {
            height: 100vh;
        }
        .image-side {
            background-image: url('{{ asset('img/knowyouremployee.jpg') }}');;
            background-size: cover;
            background-position: center;
        }
        
        @media (max-width: 767.98px) {
            .image-side {
                order: -1; /* Bring image side to the top */
            }
        }

    </style>
</head>
<body>

<div class="container-fluid login-container">
    <div class="row h-100">
        <!-- Left Side with Image -->
        <div class="col-lg-6 d-none d-lg-block image-side"></div>
        
        <!-- Right Side with Form -->
        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
            <div class="w-75">
                <h2 class="text-center mb-4">Login</h2>

                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <div class="mt-3 text-center">
                        <a href="">Forgot Your Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional for some components like tooltips) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
