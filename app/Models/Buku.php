<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class buku extends Model
{
    public function pull($perpus, $z)
    {
        return DB::table($perpus)->where($z)->first();
    }

    public function tampil($table)
    {
        $query = DB::table($table);

        switch ($table) {
            case 'petugas':
                $query->orderby('IDPetugas', 'desc');
                break;

            case 'jabatans':
                $query->orderby('IDJabatan', 'desc');
                break;

            case 'buku':
                $query->orderby('IDBuku', 'desc');
                break;

            case 'siswas':
                $query->orderby('IDSiswa', 'desc');
                break;

            case 'pengembalian':
                $query->orderby('IDPengembalian', 'desc');
                break;

            default:
                $query->orderby('id', 'desc');
                break;
        }

        return $query->get();
    }

    public function tambah($table, $data)
    {
        return DB::table($table)->insert($data);
    }

    public function perbaruiData($table, $data, $ID)
    {
        if ($table == 'buku') {
            return DB::table($table)->where('IDBuku', $ID)->update($data);
        }

        if ($table == 'petugas') {
            return DB::table($table)->where('IDPetugas', $ID)->update($data);
        }

        if ($table == 'siswas') {
            return DB::table($table)->where('IDSiswa', $ID)->update($data);
        }
    }

    public function peminjamanjoin()
    {
        return DB::table('peminjaman')
            ->join('siswas', 'peminjaman.IDSiswa', 'siswas.IDSiswa')
            ->join('petugas', 'peminjaman.IDPetugas', 'petugas.IDPetugas')
            ->get();
    }

    public function detailjoin()
    {
        return DB::table('detail_peminjaman')
            ->join('buku', 'detail_peminjaman.IDBuku', 'buku.IDBuku')
            ->get();
    }

    public function dendajoin()
    {
        return DB::table('denda')
            ->join('siswas', 'denda.IDSiswa', 'siswas.IDSiswa')
            ->get();
    }

    public function pengembalianjoin()
    {
        return DB::table('pengembalian')
            ->join('siswas', 'pengembalian.IDSiswa', 'siswas.IDSiswa')
            ->get();
    }

    public function hapus($table, $ID)
    {
        if ($table == 'buku') {
            return DB::table($table)->where('IDBuku', $ID)->delete();
        }

        if ($table == 'peminjaman') {
            return DB::table($table)->where('IDPeminjaman', $ID)->delete();
        }

        if ($table == 'siswas') {
            return DB::table($table)->where('IDSiswa', $ID)->delete();
        }
    }

    public function hapusKaryawan($IDPetugas)
    {
        return DB::table('petugas')->where('IDPetugas', $IDPetugas)->delete();
    }

    public function Perbaruipeminjaman($data, $IDPeminjaman)
    {
        return DB::table('peminjaman')
            ->where('IDPeminjaman', $IDPeminjaman)
            ->update($data);
    }

    public function Perbaruidenda($dataDenda, $IDDenda)
    {
        return DB::table('denda')
            ->where('IDDenda', $IDDenda)
            ->update($dataDenda);
    }

    public function Perbaruipengembalian($data, $IDPengembalian)
    {
        return DB::table('pengembalian')
            ->where('IDPengembalian', $IDPengembalian)
            ->update($data);
    }

    public function hapuspengembalian($IDPengembalian)
    {
        return DB::table('pengembalian')
            ->where('IDPengembalian', $IDPengembalian)
            ->delete();
    }
}
