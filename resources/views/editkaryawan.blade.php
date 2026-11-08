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
    .edit-container {
        width: 100%;
        max-width: 500px;
        margin: 65px auto;
        padding: 35px 40px;
        background: linear-gradient(135deg, rgba(222,229,255,0.96), rgba(238,220,255,0.96));
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(25,20,90,0.3);
        border: 1px solid rgba(255,255,255,0.6);
    }
    .edit-container h4 {
        text-align: center;
        font-weight: 700;
        color: #343a70;
        margin-bottom: 25px;
    }
    .edit-container .form-label {
        font-weight: 600;
        color: #34345f;
        margin-bottom: 7px;
    }
    .edit-container .form-control {
        height: 45px;
        border-radius: 9px;
        border: 1px solid #c9c9e8;
        padding: 10px 14px;
        font-size: 14px;
        background-color: #fff;
    }
    .edit-container .mb-3 {
        margin-bottom: 16px !important;
    }
    .edit-container .btn {
        border-radius: 9px;
        font-size: 14px;
        padding: 10px 20px;
        font-weight: 600;
    }
    .btn-save {
        background: #6254c5;
        color: white;
        border: none;
    }
    .btn-save:hover {
        background: #493b9e;
        color: white;
    }
    .btn-kembali {
        background: rgba(255,255,255,0.7);
        color: #493b9e;
        border: 1px solid #6254c5;
    }
    .btn-kembali:hover {
        background: #343a70;
        color: white;
    }
    @media (max-width: 576px) {
        .edit-container {
            width: 92%;
            margin: 35px auto;
            padding: 25px 20px;
        }
    }
</style>
<div class="container-fluid">
    <div class="edit-container">
        <h4>EDIT KARYAWAN</h4>
        <form method="POST" action="/editkaryawan/{{ $karyawan->IDPetugas }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Petugas:</label>
                <input type="text" name="ptgs" class="form-control" value="{{ $karyawan->nama_petugas }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin:</label>
                <select name="jk" class="form-control" required>
                    <option value="Pria" {{ $karyawan->Gender == 'Pria' ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{ $karyawan->Gender == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jabatan:</label>
                <select name="jbt" class="form-control" required>
                    @foreach ($jabatan as $value)
                    <option value="{{ $value->IDJabatan }}" {{ $karyawan->IDJabatan == $value->IDJabatan ? 'selected' : '' }}>
                        {{ $value->NamaJabatan }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto:</label>
                @if ($karyawan->image)
                    <div class="mb-2">
                        <img src="{{ asset('assets/img/' . $karyawan->image) }}" width="80" alt="Foto Karyawan">
                    </div>
                @endif
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="submit" class="btn btn-save">Save</button>
                <a href="/homeKaryawans" class="btn btn-kembali text-decoration-none">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection