
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
    }
</style>

<div class="d-flex justify-content-center align-items-center w-100 py-5" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 500px; background: rgba(255, 255, 255, 0.95);">
        <div class="card-body">
            <h2 class="card-title text-center mb-4 fw-bold">EDIT PEMINJAMAN</h2>

            <form method="POST" action="/edit-peminjaman/{{ $peminjaman->IDPeminjaman }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Siswa:</label>
                    <select name="IDSiswa" class="form-control" required>
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswas as $key => $value)
                        <option value="{{ $value->IDSiswa }}" {{ $peminjaman->IDSiswa == $value->IDSiswa ? 'selected' : '' }}>
                            {{ $value->NamaSiswa }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Petugas:</label>
                    <select name="IDPetugas" class="form-control" required>
                        <option value="">Pilih Petugas</option>
                        @foreach ($petugas as $key => $value)
                        <option value="{{ $value->IDPetugas }}" {{ $peminjaman->IDPetugas == $value->IDPetugas ? 'selected' : '' }}>
                            {{ $value->nama_petugas }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Peminjaman:</label>
                    <input type="date" name="TglPeminjaman" class="form-control" value="{{ $peminjaman->TglPeminjaman }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <input type="text" name="Status" class="form-control" value="{{ $peminjaman->Status }}" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/homepeminjaman" class="btn btn-outline-secondary text-decoration-none">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
