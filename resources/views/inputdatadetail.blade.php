<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Detail Peminjaman</title>
</head>
<body>
    <h1>Input Data Detail Peminjaman</h1>
    <form action="/detailpeminjaman" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="idpeminjaman">ID Peminjaman</label></td>
                <td><input type="number" name="idpeminjaman" required></td>
            </tr>
            <tr>
                <td><label for="idbuku">Buku</label></td>
                <td>
                    <select name="idbuku" required>
                        <option value="">Pilih Buku</option>
                        <?php
                        foreach ($buku as $key => $value) {
                        ?>
                        <option value="<?= $value->IDBuku ?>">
                            <?= $value->JudulBuku ?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="jumlah">Jumlah</label></td>
                <td><input type="number" name="jumlah" required></td>
            </tr>
            <tr>
                <td><button type="submit">Simpan Detail Peminjaman</button></td>
                <td><button type="button"><a href="/logout">Logout</a></button></td>
            </tr>
        </table>
    </form>
</body>
</html>