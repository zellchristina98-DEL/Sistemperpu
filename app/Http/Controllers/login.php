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

    public function petugas()
    {
        return view('homePetugas');
    }

    public function siswa()
    {
        return view('homeSiswa');
    }

    public function aksilogout()
    {
        session()->flush();
        return redirect()->intended('/');
    }

    public function aksilogin(Request $request)
    {
        $username =$request->input('u');
        $password =$request->input('p');

        $jalur = new buku;
        $whereUser = array(
            'username' => $username,
            'password' => $password
        );

        $hasilUser = $jalur->pull('users',$whereUser);

        if ($hasilUser) {
            session([
                'u'      => $hasilUser->username,
                'iduser' => $hasilUser->iduser
            ]);

            $cekPetugas = $jalur->pull('petugas', ['iduser' =>$hasilUser->iduser]);
            if ($cekPetugas) {
                return redirect()->intended('/homePetugas');
            }
            $cekSiswa = $jalur->pull('siswas', ['IDUser' =>$hasilUser->iduser]);
            if ($cekSiswa) {
                return redirect()->intended('/homeSiswa');
            }
        }

        return redirect('/')->withErrors(['msg' => 'Username atau Password salah!']);
    }

    public function homepetugas()
    {
        $jalur = new buku;
        $data['petugas'] =$jalur->tampil('petugas'); 
        return view('homePetugas', $data);
    }

    public function homesiswa()
    {
        $jalur = new buku;
        $data['siswa'] =$jalur->tampil('siswas');
        return view('homeSiswa', $data);
    }

    public function inputsiswa()
    {
        return view('inputsiswa');
    }
       public function inputdata()
    {
        return view('register');
    }
     public function inputpetugas()
    {
        $jalur= new buku;
        $data['petugas'] =$jalur->tampil('jabatans'); 
        return view('inputPetugas',$data);
    }
    public function aksiinputsiswa(Request $request)
    {
        $us     =$request->input('us');
        $p      =$request->input('p');
        $e      =$request->input('e');
        $nsiswa =$request->input('nsiswa');
        $rombel =$request->input('rombel');
        $nis    =$request->input('nis');

        $jalur = new buku;
        $dataUser = array(
            "username" => $us,
            "password" => $p,
            "Email"    => $e
        );
        $jalur->tambah('users',$dataUser);
        $userBaru = $jalur->pull('users', ['username' =>$us]);

        if ($userBaru) {
            $dataSiswa = array(
                "IDUser"    => $userBaru->iduser,
                "NamaSiswa" => $nsiswa,
                "Rombel"    => $rombel,
                "NIS"       => $nis
            );
            $jalur->tambah('siswas',$dataSiswa);
        }

        return redirect('/');
    }
 public function aksiinputpetugas(Request $request){
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
                "Level"        => "Petugas",
                "IDJabatan"    => $jabatan 
            );
            $jalur->tambah('petugas', $dataPetugas);
        }
        return redirect('/')->with('success','Registrasi petugas berhasil disimpan');
}
}