<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Brush+Script+MT&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .login-container {
            margin-top: 8%;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .form-control {
            border-radius: 0.75rem;
        }
        .forgot-password {
            font-size: 0.875rem;
        }
        .company-name {
            font-family: 'Brush Script MT', cursive;
            /* font-size: xx-large; */
            color: #611cb7;
            margin-bottom: 60px;
        }
        .btnlogin {
            background-color: #611cb7;
            color: #ffffff;
            padding: 10px !important;
        }
        .cardlogin {
            padding: 80px 50px !important;
            border-top: 4px solid #611cb7 !important;     /* Ungu */
    border-right: 4px solid #ff9800 !important;   /* Oranye */
    border-bottom: 4px solid #4caf50 !important;  /* Hijau */
    border-left: 4px solid #2196f3 !important;    /* Biru */
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 cardlogin">
                    <h1 class="text-center mb-12 company-name">MM Bakery</h1>
                    <!-- <h6 class="text-center mb-4">Login Admin</h6> -->
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3 text-end">
                            <a href="#" class="text-decoration-none forgot-password">Lupa Password?</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn rounded-pill btnlogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
