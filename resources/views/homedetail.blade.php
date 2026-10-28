@extends('template')

@section('content')
    <h1 class="mb-4 fw-bold">Detail Buku Peminjaman</h1>
            <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Jumlah</th>
            <th class="text-center">Delete</th>
        </tr>
   </thead>
            <tbody>
        <?php
        $no=1;
        foreach ($detailPeminjaman as $key => $value) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value->JudulBuku ?></td>
            <td><?= $value->Jumlah ?></td>
             </td>
                    <td class="text-center">
                        <form action="/deletepeminjaman/<?= $value->IDPeminjaman ?>" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
        </tr>

        <?php } ?>
  </tbody>
        </table>
    </div>
    <br>
    <button><a href="/homepeminjaman" class="btn btn-warning fw-bold">Kembali</a></button>
@endsection