<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>List Book Library Management System</h1>
    
      <table border='1' width='550'>
        <tr>
            <th>No</th>
            <th>Judul Buku </th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun terbit</th>
            <th>Stock</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $no=1;
        foreach ($buku as $key => $value) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
          <td><?= $value->JudulBuku ?></td>
            <td><?= $value->Pengarang ?></td>
            <td><?= $value->Penerbit?></td>
             <td><?= $value->TahunTerbit ?></td>
             <td><?= $value->Stok ?></td>
            <td>
                <button><a href="/edit/<?= $value->IDBuku ?>">Edit</a></button>
            </td>
            <td>
                <form action="/delete/<?= $value->IDBuku ?>" method="POST">
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
        <button><a href="/inputbuku">Tambah Data Buku</a></button>
    <button><a href="/homeKaryawan">Logout</a></button>

</body>
</html>