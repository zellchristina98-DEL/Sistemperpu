<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Peminjaman</title>
</head>
<body>
    <h1>Input Data Peminjaman</h1>
    <form action="/peminjaman" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="idsiswa">Siswa</label></td>
                <td>
                    <select name="idsiswa" required>
                        <option value="">Pilih Nama siswa</option>
                        <?php foreach ($siswa as $key => $value) { ?>
                        <option value="<?= $value->IDSiswa ?>">
                            <?= $value->NamaSiswa ?> (<?= $value->NIS ?>)
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="idpetugas">Petugas</label></td>
                <td>
                    <select name="idpetugas" required>
                        <option value="">Pilih Nama Petugas</option>
                        <?php foreach ($petugas as $key => $value) { ?>
                        <option value="<?= $value->IDPetugas ?>">
                            <?= $value->nama_petugas ?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tglpinjam">Tanggal Peminjaman</label></td>
                <td><input type="date" name="tglpinjam" required></td>
            </tr>
            <tr>
                <td><label for="status">Status</label></td>
                <td>
                    <select name="status" required>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Hilang">Hilang</option>
                        <option value="Dipinjam">Dipinjam</option>
                    </select>
                </td>
            </tr>
     
            <tr>
                <td><label for="idbuku">Pilih Buku</label></td>
                <td>
                    <select name="idbuku" required>
                        <option value="">Pilih Buku</option>
                        <?php foreach ($buku as $key => $value) { ?>
                        <option value="<?= $value->IDBuku ?>">
                            <?= $value->JudulBuku ?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="jumlah">Jumlah</label></td>
                <td><input type="number" name="jumlah" value="1" min="1" required></td>
            </tr>
            <tr>
                <td><button type="submit">Simpan Peminjaman</button></td>
                <td><button type="button"><a href="/logout">Logout</a></button></td>
            </tr>
        </table>
    </form>
</body>
</html>