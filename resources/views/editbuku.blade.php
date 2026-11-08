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

    .edit-container input {
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

        <h2 class="text-center">EDIT BUKU</h2>

   <form method="POST" action="/editbuku/{{ $buku->IDBuku }}">
            @csrf
            @method('PUT')

            <table>
                <tr>
                    <td><label>Judul Buku:</label></td>
                    <td>
                        <input type="text" name="JudulBuku" value="{{ $buku->JudulBuku }}" required>
                    </td>
                </tr>

                <tr>
                    <td><label>Pengarang:</label></td>
                    <td>
                        <input type="text" name="Pengarang" value="{{ $buku->Pengarang }}" required>
                    </td>
                </tr>

                <tr>
                    <td><label>Penerbit:</label></td>
                    <td>
                        <input type="text" name="Penerbit" value="{{ $buku->Penerbit }}" required>
                    </td>
                </tr>

                <tr>
                    <td><label>Tahun Penerbit:</label></td>
                    <td>
                        <input type="text" name="TahunTerbit" value="{{ $buku->TahunTerbit }}" required>
                    </td>
                </tr>

                <tr>
                    <td><label>Jumlah Stok:</label></td>
                    <td>
                        <input type="number" name="Stok" value="{{ $buku->Stok }}" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center pt-2">
                        <button type="submit" class="btn-save">Save</button>
                        <a href="/homebuku" class="btn-kembali">Kembali</a>
                    </td>
                </tr>
            </table>

        </form>

    </div>

</div>

@endsection