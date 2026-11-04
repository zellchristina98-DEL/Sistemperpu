
@extends('template')

@section('content')

<style>
    body {
        background-image: url('{{ asset("assets/img/p.jpg") }}');
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

    .form-container {
        width: 100%;
        max-width: 520px;
        margin: 65px auto;
        padding: 35px 40px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);
    }

    .form-container h4 {
        text-align: center;
        font-weight: 700;
        color: #343a70;
        margin-bottom: 30px;
    }

    .form-container .form-label {
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
    }

    .form-container .form-control,
    .form-container .form-select {
        height: 48px;
        border-radius: 9px;
        border: 1px solid #d5d5e5;
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

    @media (max-width: 576px) {
        .form-container {
            width: 92%;
            margin: 35px auto;
            padding: 25px 20px;
        }
    }
</style>

<div class="form-container">

    <h4>Input Data Pengembalian</h4>

    <form action="/simpanpengembalian" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">ID Peminjaman</label>
            <select name="IDPeminjaman" class="form-select" required>
                <option value="">-- Pilih ID Peminjaman --</option>

                @foreach($peminjaman as $value)
                    <option value="{{ $value->IDPeminjaman }}">
                        {{ $value->IDPeminjaman }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pengembalian</label>
            <input type="date" name="TglPengembalian" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kondisi Buku</label>
            <select name="KondisiBuku" class="form-select" required>
                <option value="">-- Pilih Kondisi Buku --</option>
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 gap-2">

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>
                Simpan Data
            </button>

            <a href="/homepengembalian" class="btn btn-outline-danger">
                <i class="bi bi-box-arrow-right me-1"></i>
                Logout
            </a>

        </div>

    </form>

</div>

@endsection
