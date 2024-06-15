<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class siswa extends Model
{
    public function getData(){
        return DB::table('tb_siswa')->get();
    }

    public function addSiswa($data){
        return DB::table('tb_siswa')->insert($data);
    }

    public function getSiswa($id){
        return DB::table('tb_siswa')->where('id', $id)->first();
    }

    public function updateData($data, $id){
        return DB::table('tb_siswa')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        return DB::table('tb_siswa')->where('id', $id)->delete();
    }
}
