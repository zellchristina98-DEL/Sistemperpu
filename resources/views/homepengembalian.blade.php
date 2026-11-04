
@extends('template')

@section('content')
    <h2 class="mb-4 fw-bold text-dark">Daftar Pengembalian Library Management System</h2>
    
    <div class="mb-3 d-flex gap-2">
        <a href="/inputpengembalian" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Data Pengembalian</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi Buku</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pengembalian as $key => $value) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="fw-semibold"><?= $value->IDPeminjaman ?></td>
                    <td><?= $value->TglPengembalian ?></td>
                    <td>
                        <span class="badge bg-secondary"><?= $value->KondisiBuku ?></span>
                    </td>
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
