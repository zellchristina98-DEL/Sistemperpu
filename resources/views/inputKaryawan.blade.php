<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Petugas</title>
</head>
<body>
    <h1>Input Data Karyawan</h1>
    <form action="/krywn" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="us">Username</label></td>
                <td><input type="text" name="us" required></td>
            </tr>
            <tr>
                <td><label for="p">Password</label></td>
                <td><input type="password" name="p" required></td>
            </tr>
            <tr>
                <td><label for="e">Email</label></td>
                <td><input type="email" name="e" required></td>
            </tr>
            <tr>
                <td><label for="nptgs">Nama karyawan</label></td>
                <td><input type="text" name="ptgs" required></td>
            </tr>
            <tr>
                <td><label for="level">level</label></td>
                <td>
                   <select name="level" required>
                    <option value="petugas">1</option>
                    <option value="admin">2</option>
                    <option value="manager">3</option>
</select>
</td>
            </tr>
            <tr>
                <td><label for="jk">jenis kelamin</label></td>
                <td><input type="radio" name="jk" value="Pria" required>Pria</td>
                <td><input type="radio" name="jk" value="Wanita" required>Wanita</td>
            </tr>
            <tr>
               <td><label for="jabatan">jabatan</label></td>
<td>
    <select name="jbt" required>
        <option>pilih</option>
        <?php
        foreach ($petugas as $key => $value) {
            ?>
        <option value="<?= $value->IDJabatan ?>">
                    <?= $value->NamaJabatan ?>
                </option>
        <?php } ?>
    </select>
</td>
</tr>
                <td><button type="submit">Daftar Petugas</button></td>
                 <td><button><a href=/logout>logout</a></button><td>
            </tr>
        </table>
    </form>
</body>
</html>