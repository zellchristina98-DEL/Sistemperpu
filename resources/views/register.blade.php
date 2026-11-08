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

    .daftar-container {
        width: 90%;
        max-width: 470px;
        margin: 75px auto;
        padding: 40px;

        background: linear-gradient(
            135deg,
            rgba(222, 229, 255, 0.97),
            rgba(238, 220, 255, 0.97)
        );

        border-radius: 20px;
        box-shadow: 0 10px 35px rgba(25, 20, 90, 0.3);
        border: 1px solid rgba(255,255,255,0.7);
        text-align: center;

        transform: translateY(-20px);
    }

    .daftar-container h3 {
        color: #343a70;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .daftar-container p {
        color: #626282;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .pilihan {
        display: flex;
        gap: 15px;
    }

    .btn-pilihan {
        flex: 1;
        padding: 16px 10px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #6254c5, #8174db);
        color: white;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-pilihan:hover {
        background: linear-gradient(135deg, #493b9e, #6254c5);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(73, 59, 158, 0.25);
    }

    .btn-logout {
        width: 100%;
        margin-top: 25px;
        padding: 13px;
        border: 1px solid #6254c5;
        border-radius: 12px;
        background: rgba(255,255,255,0.65);
        color: #493b9e;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-logout:hover {
        background: #343a70;
        color: white;
    }

    @media (max-width: 576px) {
        .daftar-container {
            padding: 30px 22px;
            margin: 55px auto;
        }

        .pilihan {
            gap: 10px;
        }
    }
</style>

<div class="daftar-container">

    <h3>DAFTAR AKUN</h3>

    <p>Silakan pilih jenis akun yang ingin didaftarkan</p>

    <div class="pilihan">

        <form action="/inputsiswa" method="GET" style="flex: 1;">
            <button type="submit" class="btn-pilihan">
                Siswa
            </button>
        </form>

        <form action="/inputkry" method="GET" style="flex: 1;">
            <button type="submit" class="btn-pilihan">
                Karyawan
            </button>
        </form>

    </div>

       <a href="/logout" class="btn btn-warning">
                    Logout
                </a>
    </form>

</div>

@endsection