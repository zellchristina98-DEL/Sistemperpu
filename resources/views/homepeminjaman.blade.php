@extends('template')

@section('content')
    <h2 class="mb-4 fw-bold text-dark">Daftar Peminjaman Library Management System</h2>
    
    <div class="mb-3 d-flex gap-2">
        <a href="/inputpeminjaman" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Data Peminjaman</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($peminjaman as $key => $value) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="fw-semibold"><?= $value->NamaSiswa ?></td>
                    <td><?= $value->nama_petugas ?></td>
                    <td><?= $value->TglPeminjaman ?></td>
                    <td>
                        <span class="badge bg-secondary"><?= $value->Status ?></span>
                    </td>
                    <td class="text-center">
                        <a href="/homedetail/<?= $value->IDPeminjaman ?>" class="btn btn-sm btn-outline-info px-2 py-1"><i class="fa-solid fa-circle-info"></i> Detail</a>
                    </td>
                    <td class="text-center">
                        <a href="/editpeminjaman/<?= $value->IDPeminjaman ?>" class="btn btn-sm btn-outline-primary px-2 py-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    </td>
                    <td class="text-center">
                        <form action="/deletepeminjaman/<?= $value->IDPeminjaman ?>" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="/homeKaryawans" class="btn btn-warning fw-bold"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard</a>
    </div>
@endsection