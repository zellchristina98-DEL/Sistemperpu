@extends('template')

@section('content')

<style>
    #main {
        background-image: url("{{ asset('assets/img/6.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        min-height: 100vh;
    }
</style>

<h2 class="mb-4 fw-bold text-white">
    Data Laporan Library Management System
</h2>

<div class="card p-4">

    <form action="/datalaporan" method="GET" class="mb-3">

        <input type="hidden" name="jenis" value="<?= request('jenis', 'buku') ?>">

        <label>Dari Tanggal:</label>
        <input type="date" name="tgl_awal"
            value="<?= request('tgl_awal') ?>" class="form-control mb-2">

        <label>Sampai Tanggal:</label>
        <input type="date" name="tgl_akhir"
            value="<?= request('tgl_akhir') ?>" class="form-control mb-3">

        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="/datalaporan?jenis=<?= request('jenis', 'buku') ?>"
            class="btn btn-secondary">Reset</a>

    </form>

    <div class="mb-3">

        <form action="/datalaporan" method="GET" class="d-inline">
            <input type="hidden" name="jenis" value="buku">
            <button type="submit" class="btn btn-primary">Data Buku</button>
        </form>

        <form action="/datalaporan" method="GET" class="d-inline">
            <input type="hidden" name="jenis" value="peminjaman">
            <button type="submit" class="btn btn-primary">Peminjaman</button>
        </form>

        <form action="/datalaporan" method="GET" class="d-inline">
            <input type="hidden" name="jenis" value="pengembalian">
            <button type="submit" class="btn btn-primary">Pengembalian</button>
        </form>

        <form action="/datalaporan" method="GET" class="d-inline">
            <input type="hidden" name="jenis" value="denda">
            <button type="submit" class="btn btn-primary">Denda</button>
        </form>

    </div>

    <div class="mb-3">
        <a href="/excel?<?= http_build_query(request()->only('jenis', 'tgl_awal', 'tgl_akhir')) ?>"
            class="btn btn-success">
            <i class="fa-solid fa-file-excel me-1"></i> Export Excel
        </a>

       <button type="button" class="btn btn-primary" onclick="window.print()">
    <i class="bi bi-printer"></i> Print
</button>
    </div>

    <?php if (request('jenis', 'buku') == 'buku') { ?>

    <h4>Data Buku</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; foreach ($buku as $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->JudulBuku ?></td>
                    <td><?= $value->Pengarang ?></td>
                    <td><?= $value->Penerbit ?></td>
                    <td><?= $value->TahunTerbit ?></td>
                    <td><?= $value->Stok ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php } elseif (request('jenis') == 'peminjaman') { ?>

    <h4>Data Peminjaman</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; foreach ($peminjaman as $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->NamaSiswa ?></td>
                    <td><?= $value->nama_petugas ?></td>
                    <td><?= date('d-m-Y', strtotime($value->TglPeminjaman)) ?></td>
                    <td><?= $value->Status ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php } elseif (request('jenis') == 'pengembalian') { ?>

    <h4>Data Pengembalian</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi Buku</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; foreach ($pengembalian as $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->NamaSiswa ?></td>
                    <td><?= date('d-m-Y', strtotime($value->TglPengembalian)) ?></td>
                    <td><?= $value->KondisiBuku ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php } elseif (request('jenis') == 'denda') { ?>

    <h4>Data Denda</h4>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Alasan Denda</th>
                    <th>Jumlah Denda</th>
                    <th>Status Bayar</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; foreach ($denda as $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->NamaSiswa ?></td>
                    <td><?= $value->AlasanDenda ?></td>
                    <td><?= $value->JumlahDenda ?></td>
                    <td><?= $value->StatusBayar ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php } ?>

    <br>

    <div class="mt-4">
        <a href="/homeKaryawans" class="btn btn-warning fw-bold">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    </div>

</div>

@endsection