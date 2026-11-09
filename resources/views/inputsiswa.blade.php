@extends('template')

@section('content')

<style>
    body {
        background: #9676CC;
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

    .form-container {
        width: 100%;
        max-width: 520px;
        margin: 65px auto;
        padding: 35px 40px;
        background: linear-gradient(
            135deg,
            rgba(222, 229, 255, 0.96),
            rgba(238, 220, 255, 0.96)
        );
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(25, 20, 90, 0.3);
        border: 1px solid rgba(255,255,255,0.6);
    }

    .form-container h4 {
        text-align: center;
        font-weight: 700;
        color: #343a70;
        margin-bottom: 30px;
    }

    .form-container .form-label {
        font-weight: 600;
        color: #34345f;
        margin-bottom: 8px;
    }

    .form-container .form-control {
        height: 48px;
        border-radius: 9px;
        border: 1px solid #c9c9e8;
        padding: 10px 14px;
        font-size: 14px;
        background-color: #fff;
    }

    .form-container .form-control:focus {
        border-color: #7774c9;
        box-shadow: 0 0 0 3px rgba(119, 116, 201, 0.15);
    }

    .form-container .mb-3 {
        margin-bottom: 22px !important;
    }

    .form-container .btn {
        border-radius: 9px;
        font-size: 14px;
        padding: 11px 18px;
        font-weight: 600;
    }

    .form-container .btn-primary {
        background: #6254c5;
        border: none;
    }

    .form-container .btn-primary:hover {
        background: #493b9e;
    }

    .form-container .btn-warning {
        background: rgba(255,255,255,0.7);
        border: 1px solid #6254c5;
        color: #493b9e;
    }

    .form-container .btn-warning:hover {
        background: #343a70;
        color: white;
    }

    @media (max-width: 576px) {
        .form-container {
            width: 92%;
            margin: 35px auto;
            padding: 25px 20px;
        }
    }
</style>

<div class="container-fluid">

    <div class="form-container">

        <h4>Input Data Siswa</h4>

       <form action="/swa" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="us" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="p" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="e" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" name="nsiswa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rombel</label>
                <input type="text" name="rombel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" required>
            </div>

          <div class="mb-3">
    <label class="form-label">Foto Profil Siswa</label>
    <input type="file" name="image" class="form-control" accept="image/*" required>
</div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    Daftar Siswa
                </button>

                <a href="/logout" class="btn btn-warning">
                    Logout
                </a>
            </div>

        </form>

    </div>

</div>

@endsection