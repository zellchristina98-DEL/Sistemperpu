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

        $cekKaryawan = $jalur->pull('petugas', ['iduser' => $hasilUser->iduser]);

        if ($cekKaryawan) {
            session([
                'u'      => $hasilUser->username,
                'iduser' => $hasilUser->iduser,
                'image'  => $cekKaryawan->image,
                'level'  => $cekKaryawan->level
            ]);

            return redirect()->intended('/homeKaryawans');
        }

        $cekSiswa = $jalur->pull('siswas', ['IDUser' => $hasilUser->iduser]);

        if ($cekSiswa) {
            session([
                'u'      => $hasilUser->username,
                'iduser' => $hasilUser->iduser,
                'image'  => $cekSiswa->image,
                'level'  => 'siswa'
            ]);

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
        $data['karyawan'] = $jalur->tampil('jabatans'); 
        return view('inputKaryawan',$data);
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

    if (!$request->hasFile('image')) {
        return back()->withErrors(['image' => 'Foto siswa wajib diunggah!']);
    }

    $foto = $request->file('image');
    $filename = time() . '_' . $foto->getClientOriginalName();

    $foto->move(public_path('assets/img'), $filename);

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
            "NIS"       => $nis,
            "image"     => $filename
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
    $level   = $request->input('level');

    $filename = null;
    if($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/img'), $filename);
    }

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
            "Level"        => $level,
            "IDJabatan"    => $jabatan,
            "image"        => $filename
        );

        $jalur->tambah('petugas', $dataPetugas);
    }

    return redirect('/')->with('success', 'Registrasi karyawan berhasil disimpan');
}
public function editkaryawan($IDPetugas){
    $jalur = new buku;
    $karyawan = $jalur->pull('petugas', ['IDPetugas' => $IDPetugas]);
    $jabatan = $jalur->tampil('jabatans');
    return view('editkaryawan', ['karyawan' => $karyawan, 'jabatan' => $jabatan]);
}

public function updatekaryawan(Request $request, $IDPetugas){
    $jalur = new buku;
    $data = [
        'nama_petugas' => $request->ptgs,
        'Gender' => $request->jk,
        'IDJabatan' => $request->jbt
    ];

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = time().'_'.$foto->getClientOriginalName();
        $foto->move(public_path('assets/img'), $filename);
        $data['image'] = $filename;
    }
if (session('u') == $request->ptgs) {
                session(['image' => $filename]);
            }
    $jalur->perbaruiData('petugas', $data, $IDPetugas);
    return redirect('/homeKaryawans');
}
public function deletekaryawan($IDPetugas)
{
    $jalur = new buku;
    $jalur->hapusKaryawan($IDPetugas);
    return redirect('/homeKaryawans');
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
    $jalur = new buku;
    $jalur->hapus('buku', $IDBuku);
    return redirect('/homebuku');
}


     public function peminjaman()
    {     $jalur = new buku;
          $data['peminjaman'] = $jalur->peminjamanjoin(); 
        return view('homepeminjaman', $data);
    }
     public function inputpeminjaman()
     {
       $jalur = new buku;
        $data['siswa'] = $jalur->tampil('siswas');
        $data['petugas'] = $jalur->tampil('petugas');
        $data['buku']    = $jalur->tampil('buku');
        return view('inputpeminjaman',$data);
    }
public function aksipeminjaman(Request $request)
{
    $idsiswa = $request->input('idsiswa');
    $idpetugas = $request->input('idpetugas');
    $tglpinjam = $request->input('tglpinjam');
    $status = $request->input('status');
    $idbuku = $request->input('idbuku');
    $jumlah = $request->input('jumlah');

    $dataPeminjaman = [
        'IDSiswa' => $idsiswa,
        'IDPetugas' => $idpetugas,
        'TglPeminjaman' => $tglpinjam,
        'Status' => $status
    ];

    $jalur = new buku;
    $jalur->tambah('peminjaman', $dataPeminjaman);

    $peminjaman = $jalur->pull('peminjaman', [
        'IDSiswa' => $idsiswa,
        'IDPetugas' => $idpetugas,
        'TglPeminjaman' => $tglpinjam
    ]);

    $dataDetail = [
        'IDPeminjaman' => $peminjaman->IDPeminjaman,
        'IDBuku' => $idbuku,
        'Jumlah' => $jumlah
    ];

    $jalur->tambah('detail_peminjaman', $dataDetail);

    return redirect('/homepeminjaman');
}
public function editpeminjaman($IDPeminjaman){
    $jalur = new buku;
    $peminjaman = $jalur->pull('peminjaman', ['IDPeminjaman' => $IDPeminjaman]);
    $siswas = $jalur->tampil('siswas');
    $petugas = $jalur->tampil('petugas');

    return view('editpeminjaman', compact('peminjaman', 'siswas', 'petugas'));
}
public function updatepeminjaman(Request $request, $IDPeminjaman)
{
    $dataPeminjaman = [
        'IDSiswa' => $request->input('IDSiswa'),
        'IDPetugas' => $request->input('IDPetugas'),
        'TglPeminjaman' => $request->input('TglPeminjaman'),
        'Status' => $request->input('Status')
    ];

    $jalur = new buku;
    $peminjaman = $jalur->Perbaruipeminjaman($dataPeminjaman, $IDPeminjaman);

    return redirect('/homepeminjaman');
}

        public function detail($id)
    {       $jalur = new buku;
        $data['detailPeminjaman'] = $jalur->detailjoin();
        return view('homedetail', $data);
    }
public function deletepeminjaman($IDPeminjaman)
{
    $jalur = new buku;
    $jalur->hapus('peminjaman', $IDPeminjaman);
    return redirect('/homepeminjaman');
}
public function denda()
{
    $jalur = new buku;
    $data['denda'] = $jalur->dendajoin();

    return view('homedenda', $data);
}

public function inputdenda()
{
    $jalur = new buku;
    $data['siswa'] = $jalur->tampil('siswas');

    return view('inputdenda', $data);
}

public function aksidenda(Request $request)
{
    $idsiswa = $request->input('idsiswa');
    $alasandenda = $request->input('alasandenda');
    $jumlahdenda = $request->input('jumlahdenda');
    $statusbayar = $request->input('statusbayar');

    $data = [
        'IDSiswa' => $idsiswa,
        'AlasanDenda' => $alasandenda,
        'JumlahDenda' => $jumlahdenda,
        'StatusBayar' => $statusbayar
    ];

    $jalur = new buku;
    $jalur->tambah('denda', $data);

    return redirect('/homedenda');
}
public function editdenda($id)
{
    $jalur = new buku;

    $data['denda'] = $jalur->pull('denda', ['IDDenda' => $id]);
    $data['siswa'] = $jalur->tampil('siswas');

    return view('editdenda', $data);
}

public function updatedenda(Request $request, $IDDenda)
{
    $dataDenda = [
        'IDSiswa' => $request->input('IDSiswa'),
        'AlasanDenda' => $request->input('AlasanDenda'),
        'JumlahDenda' => $request->input('JumlahDenda'),
        'StatusBayar' => $request->input('StatusBayar')
    ];

    $jalur = new buku;
    $denda = $jalur->Perbaruidenda($dataDenda, $IDDenda);

    return redirect('/homedenda');
}
public function pengembalian()
{
    $jalur = new buku;
    $data['pengembalian'] = $jalur->pengembalianjoin();

    return view('homepengembalian', $data);
}

public function inputpengembalian()
{
    $jalur = new buku;
    $data['siswa'] = $jalur->tampil('siswas');

    return view('inputpengembalian', $data);
}

public function aksipengembalian(Request $request)
{
    $idsiswa = $request->input('IDSiswa');
    $tglpengembalian = $request->input('TglPengembalian');
    $kondisibuku = $request->input('KondisiBuku');

    $data = [
        'IDSiswa' => $idsiswa,
        'TglPengembalian' => $tglpengembalian,
        'KondisiBuku' => $kondisibuku
    ];

    $jalur = new buku;
    $jalur->tambah('pengembalian', $data);

    return redirect('/homepengembalian');
}
public function editpengembalian($id)
{
    $jalur = new buku;
    $data['pengembalian'] = $jalur->pull('pengembalian', ['IDPengembalian' => $id]);
    $data['siswa'] = $jalur->tampil('siswas');
    return view('editpengembalian', $data);
}

public function aksieditpengembalian(Request $request, $id)
{
    $data = [
        'IDSiswa' => $request->input('IDSiswa'),
        'TglPengembalian' => $request->input('TglPengembalian'),
        'KondisiBuku' => $request->input('KondisiBuku')
    ];

    $jalur = new buku;
    $jalur->Perbaruipengembalian($data, $id);
    return redirect('/homepengembalian');
}

public function deletepengembalian($id)
{
    $jalur = new buku;
    $jalur->hapuspengembalian($id);
    return redirect('/homepengembalian');
}
public function aksitanggal(Request $Request)
{
    if (session('u')) {

        $tgl_awal = $Request->input('tgl_awal');
        $tgl_akhir = $Request->input('tgl_akhir');

        $jalur = new buku;

        $data['buku'] = $jalur->tampil('buku');
        $data['peminjaman'] = $jalur->peminjamanjoin();
        $data['pengembalian'] = $jalur->pengembalianjoin();
        $data['denda'] = $jalur->dendajoin();

        if ($tgl_awal && $tgl_akhir) {

            $data['peminjaman'] = collect($data['peminjaman'])->filter(function ($value) use ($tgl_awal, $tgl_akhir) {
                $tanggal = date('Y-m-d', strtotime($value->TglPeminjaman));
                return $tanggal >= $tgl_awal && $tanggal <= $tgl_akhir;
            });

            $data['pengembalian'] = collect($data['pengembalian'])->filter(function ($value) use ($tgl_awal, $tgl_akhir) {
                $tanggal = date('Y-m-d', strtotime($value->TglPengembalian));
                return $tanggal >= $tgl_awal && $tanggal <= $tgl_akhir;
            });
        }

        return view('laporan', $data);

    } else {
        return redirect('/');
    }
}


public function aksiexcel(Request $Request)
{
    if (session('u')) {

        $tgl_awal = $Request->input('tgl_awal');
        $tgl_akhir = $Request->input('tgl_akhir');

        $jalur = new buku;

        $data['buku'] = $jalur->tampil('buku');
        $data['peminjaman'] = $jalur->peminjamanjoin();
        $data['pengembalian'] = $jalur->pengembalianjoin();
        $data['denda'] = $jalur->dendajoin();

        if ($tgl_awal && $tgl_akhir) {

            $data['peminjaman'] = collect($data['peminjaman'])->filter(function ($value) use ($tgl_awal, $tgl_akhir) {
                $tanggal = date('Y-m-d', strtotime($value->TglPeminjaman));
                return $tanggal >= $tgl_awal && $tanggal <= $tgl_akhir;
            });

            $data['pengembalian'] = collect($data['pengembalian'])->filter(function ($value) use ($tgl_awal, $tgl_akhir) {
                $tanggal = date('Y-m-d', strtotime($value->TglPengembalian));
                return $tanggal >= $tgl_awal && $tanggal <= $tgl_akhir;
            });
        }

        return response()
            ->view('laporan', $data)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="laporan-perpustakaan.xls"');

    } else {
        return redirect('/');
    }
}


public function editsiswa($id)
{
    $jalur = new buku;

    $data['siswa'] = $jalur->pull('siswas', [
        'IDSiswa' => $id
    ]);

    if (!$data['siswa']) {
        return redirect('/homeSiswa');
    }

    return view('editsiswa', $data);
}


public function updatesiswa(Request $request, $id)
{
    $jalur = new buku;

    $data = [
        'NamaSiswa' => $request->NamaSiswa,
        'Rombel' => $request->Rombel,
        'NIS' => $request->NIS
    ];

    if ($request->hasFile('image')) {

        $filename = time() . '_' . $request->file('image')->getClientOriginalName();

        $request->file('image')->move(public_path('assets/img'), $filename);

        $data['image'] = $filename;

        if (session('level') == 'siswa') {
            session(['image' => $filename]);
        }
    }

    $jalur->perbaruiData('siswas', $data, $id);

    return redirect('/homeSiswa');
}

public function deletesiswa($id)
{
    $jalur = new buku;

    $jalur->hapus('siswas', $id);

    return redirect('/homeSiswa');
}
}