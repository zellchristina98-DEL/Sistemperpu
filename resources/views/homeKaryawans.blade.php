@extends('template')
@section('content')

    <h1>Welcome Karyawan <?php echo session('u')?> to the Library Management System</h1>
      <table  class="table table-striped" width='550'>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Gender</th>
            <th>level</th>
            <th>Jabatan</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $no=1;
        foreach ($karyawan as $key => $value) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
          <td><?= $value->nama_petugas ?></td>
            <td><?= $value->Gender ?></td>
            <td><?= $value->level ?></td>
             <td><?= $value->IDJabatan ?></td>
            <td>
                <button><a href="/edit/<?= $value->IDPetugas ?>">Edit</a></button>
            </td>
            <td>
                <form action="/delete/<?= $value->IDPetugas ?>" method="POST">
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
        <button  class="btn btn-warning"><a href="/homebuku">Buku</a></button>
    <button><a href="/logout">Logout</a></button>
    @endsection

