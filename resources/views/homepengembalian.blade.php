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

<h2 class="mb-4 fw-bold text-white">Daftar Pengembalian Library Management System</h2>

<?php if (session('level') != 'siswa') { ?>
<div class="mb-3 d-flex gap-2">
    <a href="/inputpengembalian" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus me-1"></i> Tambah Data Pengembalian
    </a>
</div>
<?php } ?>

<div class="card_body bg-light p-4 rounded shadow-sm">
        <table class="table table-striped table-hover align-middle">
            <h2>DATA PENGEMBALIAN</H2>

        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi Buku</th>

                <?php if (session('level') != 'siswa') { ?>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($pengembalian as $key => $value) {
            ?>

            <tr>
                <td><?= $no++ ?></td>
                <td class="fw-semibold"><?= $value->NamaSiswa ?></td>
                <td><?= $value->TglPengembalian ?></td>
                <td>
                    <span class="badge bg-secondary"><?= $value->KondisiBuku ?></span>
                </td>

                <?php if (session('level') != 'siswa') { ?>
                <td class="text-center">
                    <a href="/edit-pengembalian/<?= $value->IDPengembalian ?>" class="btn btn-sm btn-outline-primary px-2 py-1">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                </td>

                <td class="text-center">
                    <form action="/deletepengembalian/<?= $value->IDPengembalian ?>" method="POST" class="d-inline">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
                <?php } ?>

            </tr>

            <?php
            }
            ?>
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