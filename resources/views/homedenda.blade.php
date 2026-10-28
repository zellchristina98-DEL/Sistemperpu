@extends('template')

@section('content')
    <h1 class="mb-4 fw-bold">Daftar Denda Library Management System</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">

                 <div class="mb-3 d-flex gap-2">
        <a href="/inputpeminjaman" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Data Denda</a>
    </div>
        <tr>
            <th>No</th>
            <th>Nama Siswa </th>
            <th>Alasan Denda</th>
            <th>Jumlah Denda</th>
            <th>Status Bayar</th>
            <th>Delete</th>
        </tr>
  </thead>
            <tbody>
        <?php
        $no=1;
        foreach ($denda as $key => $value) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value->NamaSiswa ?></td>
            <td><?= $value->AlasanDenda ?></td>
            <td><?= $value->JumlahDenda ?></td>
            <td><?= $value->StatusBayar ?></td>
            <td>
                <form action="/deletedenda/<?= $value->IDDenda ?>" method="POST">
                    @csrf
                    @method('delete')
                     <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>

        <?php } ?>

    </table>
    <br>
       <div class="mt-4">
        <a href="/homeKaryawans" class="btn btn-warning fw-bold"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard</a>
    </div>
@endsection