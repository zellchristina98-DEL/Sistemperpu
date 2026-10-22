    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>EDIT</title>
    </head>
    <body>

    <h2>EDIT</h2>

    <form method="POST" action="/edit/{{ $buku->IDBuku }}">
        @csrf
        @method('PUT')

        <table>
                <tr>
                    <td><label>Judul Buku:</label></td>
                    <td><input type="text" name="JudulBuku" value="{{$buku->JudulBuku}}" required></td>
                </tr>
                <tr>
                    <td><label>Pengarang:</label></td>
                    <td><input type="text" name="Pengarang" value="{{$buku->Pengarang}}" required></td>
                </tr>
                <tr>
                    <td><label>Penerbit:</label></td>
                    <td><input type="text" name="Penerbit" value="{{$buku->Penerbit}}" required></td>
                </tr>
                <tr>
                    <td><label>Tahun Penerbit:</label></td>
                    <td><input type="text" name="TahunTerbit" value="{{$buku->TahunTerbit}}" required></td>
                </tr>
                <tr>
                    <td><label>Jumlah Stok:</label></td>
                    <td><input type="number" name="Stok" value="{{ $buku->Stok }}" required></td>
                </tr>
        <tr> 
    <td><button type="submit">Save</button></td> 
    </tr>
    </form>

    </body>
    </html>