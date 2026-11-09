@extends('template')

@section('content')

<style>
    #main {
        background-image: url("{{ asset('assets/img/3.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        min-height: 100vh;
    }
</style>

<h2 class="mb-4 fw-bold text-white">Daftar Denda Library Management System</h2>

<?php if (session('level') != 'siswa') { ?>
<div class="mb-3">
    <a href="/inputdenda" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus me-1"></i> Tambah Data Denda
    </a>
</div>
<?php } ?>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Alasan Denda</th>
                <th>Jumlah Denda</th>
                <th>Status Bayar</th>

                <?php if (session('level') != 'siswa') { ?>
                    <th>Edit</th>
                    <th>Delete</th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($denda as $key => $value) {
            ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->NamaSiswa ?></td>
                <td><?= $value->AlasanDenda ?></td>
                <td><?= $value->JumlahDenda ?></td>
                <td><?= $value->StatusBayar ?></td>

                <?php if (session('level') != 'siswa') { ?>
                <td>
                    <a href="/editdenda/<?= $value->IDDenda ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-pen"></i> Edit
                    </a>
                </td>

                <td>
                    <form action="/deletedenda/<?= $value->IDDenda ?>" method="POST">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
                <?php } ?>

            </tr>

            <?php } ?>
        </tbody>

    </table>
</div>

<div class="mt-4">
    <?php if (session('level') == 'siswa') { ?>
        <a href="/homeSiswa" class="btn btn-warning fw-bold">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    <?php } else { ?>
        <a href="/homeKaryawans" class="btn btn-warning fw-bold">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    <?php } ?>
</div>

@endsection