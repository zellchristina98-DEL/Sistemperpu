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
        width: 500px;
        max-width: 95%;
        margin: 65px auto;
        padding: 30px;
        border-radius: 15px;
        background: linear-gradient(rgba(222,229,255,0.96), rgba(238,220,255,0.96));
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }

    .btn-save {
        background: #9676CC;
        color: white;
        border: none;
    }

    .btn-save:hover {
        background: #7956B5;
        color: white;
    }

    .btn-kembali {
        background: #6c757d;
        color: white;
        border: none;
    }

    .btn-kembali:hover {
        background: #565e64;
        color: white;
    }
</style>

<div class="edit-container">

    <h3 class="text-center fw-bold mb-4">EDIT PENGEMBALIAN</h3>

    <form action="/aksieditpengembalian/<?= $pengembalian->IDPengembalian ?>" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-bold">Nama Siswa</label>
            <select name="IDSiswa" class="form-control" required>
                <option value="">Pilih Siswa</option>

                <?php foreach ($siswa as $key => $value) { ?>
                    <option value="<?= $value->IDSiswa ?>"
                        <?= $value->IDSiswa == $pengembalian->IDSiswa ? 'selected' : '' ?>>
                        <?= $value->NamaSiswa ?> (<?= $value->NIS ?>)
                    </option>
                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tanggal Pengembalian</label>
            <input type="date" name="TglPengembalian" class="form-control"
                value="<?= $pengembalian->TglPengembalian ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Kondisi Buku</label>
            <select name="KondisiBuku" class="form-control" required>
                <option value="">Pilih Kondisi Buku</option>
                <option value="Baik" <?= $pengembalian->KondisiBuku == 'Baik' ? 'selected' : '' ?>>Baik</option>
                <option value="Rusak Ringan" <?= $pengembalian->KondisiBuku == 'Rusak Ringan' ? 'selected' : '' ?>>Rusak Ringan</option>
                <option value="Rusak Berat" <?= $pengembalian->KondisiBuku == 'Rusak Berat' ? 'selected' : '' ?>>Rusak Berat</option>
            </select>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-save w-100 fw-bold">
                Save
            </button>

            <a href="/homepengembalian" class="btn btn-kembali w-100 fw-bold">
                Back
            </a>
        </div>

    </form>

</div>

@endsection
