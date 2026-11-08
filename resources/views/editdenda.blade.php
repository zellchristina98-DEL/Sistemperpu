@extends('template')

@section('content')

<style>
    body {
        background: #9676CC;
        min-height: 100vh;
        margin: 0;
    }

    #header, .header, #sidebar, .sidebar {
        display: none !important;
    }

    #main, .main {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    .edit-container {
        width: 500px;
        max-width: 95%;
        background: linear-gradient(135deg, rgba(222,229,255,0.96), rgba(238,220,255,0.96));
        border-radius: 18px;
        padding: 20px 30px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    .edit-container h2 {
        color: #493477;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .edit-container table {
        width: 100%;
    }

    .edit-container td {
        padding: 4px 5px;
    }

    .edit-container input,
    .edit-container select {
        width: 100%;
        padding: 7px;
        border: 1px solid #b9a6dc;
        border-radius: 7px;
    }

    .btn-save {
        background: #9676CC;
        color: white;
        border: none;
        padding: 8px 22px;
        border-radius: 7px;
        cursor: pointer;
    }

    .btn-kembali {
        background: #6c6280;
        color: white;
        padding: 8px 18px;
        border-radius: 7px;
        text-decoration: none;
        display: inline-block;
    }
</style>

<div class="d-flex justify-content-center align-items-center w-100 py-3" style="min-height: 100vh;">
    <div class="edit-container">
        <h2 class="text-center">EDIT DENDA</h2>

        <form method="POST" action="/updatedenda/{{ $denda->IDDenda }}">
            @csrf
            <table>
                <tr>
                    <td><label>Nama Siswa:</label></td>
                    <td>
                        <select name="IDSiswa" required>
                            @foreach ($siswa as $s)
                                <option value="{{ $s->IDSiswa }}" {{ $denda->IDSiswa == $s->IDSiswa ? 'selected' : '' }}>
                                    {{ $s->NamaSiswa }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Alasan Denda:</label></td>
                    <td>
                        <select name="AlasanDenda" required>
                            <option value="RUSAK" {{ $denda->AlasanDenda == 'RUSAK' ? 'selected' : '' }}>RUSAK</option>
                            <option value="HILANG" {{ $denda->AlasanDenda == 'HILANG' ? 'selected' : '' }}>HILANG</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Jumlah Denda:</label></td>
                    <td>
                        <input type="number" name="JumlahDenda" value="{{ $denda->JumlahDenda }}" required>
                    </td>
                </tr>

                <tr>
                    <td><label>Status Bayar:</label></td>
                    <td>
                        <select name="StatusBayar" required>
                            <option value="TUNTAS" {{ $denda->StatusBayar == 'TUNTAS' ? 'selected' : '' }}>TUNTAS</option>
                            <option value="BELUM TUNTAS" {{ $denda->StatusBayar == 'BELUM TUNTAS' ? 'selected' : '' }}>BELUM TUNTAS</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center pt-2">
                        <button type="submit" class="btn-save">Save</button>
                        <a href="/homedenda" class="btn-kembali">Kembali</a>
                    </td>
                </tr>
            </table>

        </form>

    </div>

</div>

@endsection