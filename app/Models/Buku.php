<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class buku extends Model
{
    public function pull($perpus, $z){
        return DB::table($perpus)->where($z)->first();
    }

    public function tampil($table)
    {
        return DB::table($table)->get();
    }

    public function tambah($table, $data)
    {
        return DB::table($table)->insert($data);
    }



    public function perbaruiData($table, $data, $IDBuku)
{
    return \DB::table($table)->where('IDBuku', $IDBuku)->update($data);
}
}