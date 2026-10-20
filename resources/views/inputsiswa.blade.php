<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
</head>
<body>
    <h1>Sign Up Siswa</h1>
    <form action="/swa" method="POST">
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
                <td><label for="nsiswa">Nama Siswa</label></td>
                <td><input type="text" name="nsiswa" required></td>
            </tr>
            <tr>
                <td><label for="rombel">Rombel</label></td>
                <td><input type="text" name="rombel" required></td>
            </tr>
            <tr>
                <td><label for="nis">NIS</label></td>
                <td><input type="text" name="nis" required></td>
            </tr>
            <tr>
                <td><button type="submit">Daftar Siswa</button></td>
                 <td><button><a href=/logout>logout</a></button><td>
            </tr>
        </table>
    </form>
</body>
</html>