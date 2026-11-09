@extends('template')

@section('content')

<style>
    #main {
        background-image: url("{{ asset('assets/img/6.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        min-height: 100vh;
    }
</style>

<div class="container-fluid">

    <h2 class="mb-4 fw-bold text-white">
        Welcome <?php echo (session('level')); ?> <?php echo session('u')?> to the Library Management System
    </h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Karyawan</th>
                    <th>Gender</th>
                    <th>Level</th>
                    <th>Jabatan</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($karyawan as $key => $value) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>

                    <td>
                        @if(!empty($value->image))
                            <img src="{{ asset('assets/img/' . $value->image) }}"
                            alt="Foto" width="50" height="50"
                            class="rounded-circle"
                            style="object-fit: cover;">
                        @endif
                    </td>

                    <td><?= $value->nama_petugas ?></td>
                    <td><?= $value->Gender ?></td>
                    <td><?= $value->level ?></td>
                    <td><?= $value->IDJabatan ?></td>

                    <td class="text-center">
                        <a href="/editkaryawan/<?= $value->IDPetugas ?>" class="btn btn-sm btn-outline-primary px-2 py-1">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                    </td>

                    <td class="text-center">
                        <form action="/deletekaryawan/<?= $value->IDPetugas ?>" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>

</div>

@endsection