<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Denda</title>
</head>
<body>
    <h1>Input Data Denda</h1>
    <form action="/denda" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="alasandenda">Alasan Denda</label></td>
                <td><input type="text" name="alasandenda" required></td>
            </tr>
            <tr>
                <td><label for="jumlahdenda">Jumlah Denda</label></td>
                <td><input type="number" name="jumlahdenda" required></td>
            </tr>
            <tr>
                <td><label for="statusbayar">Status Bayar</label></td>
                <td>
                    <select name="statusbayar" required>
                        <option value="TUNTAS">TUNTAS</option>
                        <option value="BELUM TUNTAS">BELUM TUNTAS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit">Simpan Denda</button></td>
                <td><button type="button"><a href="/homedenda">Kembali</a></button></td>
            </tr>
        </table>
    </form>
</body>
</html>