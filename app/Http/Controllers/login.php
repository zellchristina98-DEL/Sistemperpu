<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function karyawan()
    {
        $jalur = new buku;
        $data['karyawan'] = $jalur->tampil('petugas'); 
        return view('homeKaryawans', $data);
    }

    public function siswa()
    {
        $jalur = new buku;
        $data['siswa'] = $jalur->tampil('siswas');
        return view('homeSiswa', $data);
    }

    public function aksilogout()
    {
        session()->flush();
        return redirect()->intended('/');
    }

    public function aksilogin(Request $request)
    {
        $username = $request->input('u');
        $password = $request->input('p');

        $jalur = new buku;
        $whereUser = array(
            'username' => $username,
            'password' => $password
        );

        $hasilUser = $jalur->pull('users', $whereUser);

        if ($hasilUser) {
            session([
                'u'      => $hasilUser->username,
                'iduser' => $hasilUser->iduser
            ]);

            $cekKaryawan = $jalur->pull('petugas', ['iduser' => $hasilUser->iduser]);
            if ($cekKaryawan) {
                return redirect()->intended('/homeKaryawans');
            }
            $cekSiswa = $jalur->pull('siswas', ['IDUser' => $hasilUser->iduser]);
            if ($cekSiswa) {
                return redirect()->intended('/homeSiswa');
            }
        }

        return redirect('/')->withErrors(['msg' => 'Username atau Password salah!']);
    }

    public function inputsiswa()
    {
        return view('inputsiswa');
    }

    public function inputdata()
    {
        return view('register');
    }

    public function inputkry()
    {
        $jalur = new buku;
        $data['petugas'] = $jalur->tampil('jabatans'); 
        return view('inputKaryawan', $data);
    }

    public function aksiinputsiswa(Request $request)
    {
        $us     = $request->input('us');
        $p      = $request->input('p');
        $e      = $request->input('e');
        $nsiswa = $request->input('nsiswa');
        $rombel = $request->input('rombel');
        $nis    = $request->input('nis');

        $jalur = new buku;
        $dataUser = array(
            "username" => $us,
            "password" => $p,
            "Email"    => $e
        );
        $jalur->tambah('users', $dataUser);
        $userBaru = $jalur->pull('users', ['username' => $us]);

        if ($userBaru) {
            $dataSiswa = array(
                "IDUser"    => $userBaru->iduser,
                "NamaSiswa" => $nsiswa,
                "Rombel"    => $rombel,
                "NIS"       => $nis
            );
            $jalur->tambah('siswas', $dataSiswa);
        }

        return redirect('/');
    }

    public function aksiinputkry(Request $request)
    {
        $us      = $request->input('us');
        $p       = $request->input('p');
        $e       = $request->input('e');
        $ptgs    = $request->input('ptgs');
        $jk      = $request->input('jk');
        $jabatan = $request->input('jbt'); 

        $jalur = new buku;
        $dataUser = array(
            "username" => $us,
            "password" => $p,
            "Email"    => $e
        );
        $jalur->tambah('users', $dataUser);
        $userBaru = $jalur->pull('users', ['username' => $us]);

        if ($userBaru) {
            $dataPetugas = array(
                "Iduser"       => $userBaru->iduser,
                "nama_petugas" => $ptgs,
                "Gender"       => $jk,
                "Level"        => "Karyawan",
                "IDJabatan"    => $jabatan 
            );
            $jalur->tambah('petugas', $dataPetugas);
        }
        return redirect('/')->with('success', 'Registrasi karyawan berhasil disimpan');
    }

//buku
    public function inputbuku()
    {
        return view('inputbuku');
    }
     public function buku()
    {
        $jalur = new buku;
        $data['buku'] = $jalur->tampil('buku'); 
        return view('homebuku', $data);
    }
     public function aksibuku(Request $request)
    {
        $judul     = $request->input('judul');
        $pengarang = $request->input('pengarang');
        $penerbit  = $request->input('penerbit');
        $thnterbit  = $request->input('thn');
        $stok      = $request->input('stok');

        $dataBuku = [
            'JudulBuku' => $judul,
            'Pengarang'  => $pengarang,
            'Penerbit'   => $penerbit,
            'TahunTerbit'   => $thnterbit,
            'Stok'       => $stok
        ];
        
        $jalur = new buku;
       $jalur->tambah('buku', $dataBuku);
        return redirect('/homebuku')->with('success', 'Data buku berhasil disimpan');
    }

     public function editbuku($IDBuku){
    $jalur = new buku;
    $buku = $jalur->pull('buku', ['IDBuku' => $IDBuku]); 
    return view('editbuku', ['buku' => $buku]);
}

public function updatebuku(Request $request, $IDBuku)
{
    $dataBuku = [
        'JudulBuku'   => $request->input('JudulBuku'),
        'Pengarang'   => $request->input('Pengarang'),
        'Penerbit'    => $request->input('Penerbit'),
        'TahunTerbit' => $request->input('TahunTerbit'),
        'Stok'        => $request->input('Stok')
    ];
    $jalur= new buku;
    $buku = $jalur->perbaruiData('buku', $dataBuku, $IDBuku);
    return redirect('/homebuku');
}

    public function deletebuku($IDBuku)
    {
        buku::where('IDBuku', $IDBuku)->delete();
        return redirect('/homeBuku');
    }
}