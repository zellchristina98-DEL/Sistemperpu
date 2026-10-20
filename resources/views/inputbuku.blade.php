<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Buku</title>
</head>
<body>
    <h2>Input Data Buku</h2>

    <form action="/BUKU" method="POST">
        @csrf
        <table>
            <tr>
                <td><label>Judul Buku:</label></td>
                <td><input type="text" name="judul" required></td>
            </tr>
            <tr>
                <td><label>Pengarang:</label></td>
                <td><input type="text" name="pengarang" required></td>
            </tr>
            <tr>
                <td><label>Penerbit:</label></td>
                <td><input type="text" name="penerbit" required></td>
            </tr>
            <tr>
                <td><label>Tahun Penerbit:</label></td>
                <td><input type="text" name="thn" required></td>
            </tr>
            <tr>
                <td><label>Jumlah Stok:</label></td>
                <td><input type="number" name="stok" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Simpan Data Buku</button>
                <button><a href="/homebuku">Logout</a></button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>