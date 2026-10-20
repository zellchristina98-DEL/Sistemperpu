<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome Siswa <?php echo session('u')?> to the Library Management System</h1>
    <table border='1' width='550'>
        <tr>
            <th>No</th>
            <th>Namasiswa</th>
            <th>Rombel</th>
             <th>NIS</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $no=1;
        foreach ($siswa as $key => $value) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value->NamaSiswa?></td>
            <td><?= $value->Rombel ?></td>
             <td><?= $value->NIS?></td>
            <td>
                <button><a href="/edit/<?= $value->IDSiswa ?>">Edit</a></button>
            </td>
            <td>
                <form action="/delete/<?= $value->IDSiswa ?>" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>

        <?php
        }
        ?>

    </table>
    <button><a href="/logout">Logout</a></button>
    <button><a href="/homebuku">Peminjaman</a></button>
</body>
</html>