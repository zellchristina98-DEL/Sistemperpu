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

    .form-container .form-control,
    .form-container .form-select {
        height: 48px;
        border-radius: 9px;
        border: 1px solid #c9c9e8;
        padding: 10px 14px;
        font-size: 14px;
        background-color: #fff;
    }

    .form-container .form-control:focus,
    .form-container .form-select:focus {
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

        <h4>Input Data Karyawan</h4>

        <form action="/krywn" method="POST" enctype="multipart/form-data">
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
                <label class="form-label">Nama Karyawan</label>
                <input type="text" name="ptgs" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Level</label>
                <select name="level" class="form-select" required>
                    <option value="">Pilih Level</option>
                    <option value="petugas">1</option>
                    <option value="admin">2</option>
                    <option value="manager">3</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Jenis Kelamin</label>

                <div class="form-check form-check-inline">
                    <input type="radio" name="jk" value="Pria" class="form-check-input" required>
                    <label class="form-check-label">Pria</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="jk" value="Wanita" class="form-check-input" required>
                    <label class="form-check-label">Wanita</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>

                <select name="jbt" class="form-select" required>
                    <option value="">Pilih Jabatan</option>

                    <?php
                    foreach ($karyawan as $key => $value) {
                    ?>
                    <option value="<?= $value->IDJabatan ?>">
                        <?= $value->NamaJabatan ?>
                    </option>
                    <?php } ?>

                </select>
            </div>

            <div class="mb-4">
                <label for="foto" class="form-label">Foto Karyawan</label>
                <input type="file" name="foto" id="foto"
                    class="form-control" accept="image/*" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    Daftar Petugas
                </button>

                <a href="/logout" class="btn btn-warning">
                    Logout
                </a>
            </div>

        </form>

    </div>

</div>

@endsection