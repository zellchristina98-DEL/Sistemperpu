@extends('template')
@section('content')
    <h1 class="mb-4 fw-bold">Welcome Siswa <?php echo session('u')?> to the Library Management System</h1>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Namasiswa</th>
            <th>Rombel</th>
             <th>NIS</th>
            <th  class="text-center">Edit</th>
            <th  class="text-center">Delete</th>
        </tr>
 </thead>
        <?php
        $no=1;
        foreach ($siswa as $key => $value) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value->NamaSiswa?></td>
            <td><?= $value->Rombel ?></td>
             <td><?= $value->NIS?></td>
            <td class="text-center">
                        <a href="/edit/<?= $value->IDSiswa ?>" class="btn btn-sm btn-outline-primary px-2 py-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    </td>
                    <td class="text-center">
                        <form action="/delete/<?= $value->IDSiswa ?>" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
            </td>
        </tr>

        <?php
        }
        ?>
 </tbody>
        </table>
    </div>
     <div class="mt-4">
    <button><a href="/logout"  class="btn btn-warning fw-bold">Logout</a></button>
</div>
@endsection