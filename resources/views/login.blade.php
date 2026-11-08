@extends('template')

@section('content')

<style>
    body {
        background-image: url('{{ asset("assets/img/bacg.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        margin: 0;
    }

    #header, .header, #sidebar, .sidebar {
        display: none !important;
    }

    #main, .main {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    .login-container {
        width: 100%;
        max-width: 420px;
        margin: 40px auto;
        padding: 35px 40px;

        background: linear-gradient(
            135deg,
            rgba(222, 229, 255, 0.96),
            rgba(238, 220, 255, 0.96)
        );

        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(25, 20, 90, 0.3);
        transform: translateY(-20px);
        border: 1px solid rgba(255,255,255,0.6);
    }

    .login-container h4 {
        text-align: center;
        font-weight: 700;
        color: #343a70;
        margin-bottom: 30px;
    }

    .login-container .form-label {
        font-weight: 600;
        color: #34345f;
        margin-bottom: 8px;
    }

    .login-container .form-control {
        height: 48px;
        border-radius: 9px;
        border: 1px solid #c9c9e8;
        padding: 10px 14px;
        font-size: 14px;
        background-color: rgba(255,255,255,0.85);
    }

    .login-container .form-control:focus {
        border-color: #7774c9;
        box-shadow: 0 0 0 3px rgba(119, 116, 201, 0.15);
    }

    .btn-login {
        background: #6254c5;
        color: white;
        border-radius: 9px;
        padding: 12px;
        font-weight: 600;
        border: none;
    }

    .btn-login:hover {
        background: #493b9e;
        color: white;
    }

    .register {
        color: #34345f;
    }

    .register a {
        color: #6254c5;
        text-decoration: none;
        font-weight: 600;
    }

    .register a:hover {
        color: #493b9e;
        text-decoration: underline;
    }

    @media (max-width: 576px) {
        .login-container {
            width: 92%;
            margin: 50px auto;
            padding: 25px 20px;
        }
    }
</style>

<div class="login-container">

    <h4>LOGIN LIBRARY MANAGEMENT SYSTEM</h4>

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>

            <input type="text"
                class="form-control"
                id="username"
                name="u"
                placeholder="Masukkan username"
                required>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>

            <input type="password"
                class="form-control"
                id="password"
                name="p"
                placeholder="Masukkan password"
                required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>

    </form>

    <div class="register text-center mt-4">
        Belum punya akun?
        <a href="/register">Register</a>
    </div>

</div>

@endsection