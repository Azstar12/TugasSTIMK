<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'no_telepon',
        'alamat',
    ];
    public function getData()
    {
        return DB::table('tb_mahasiswa')->get();
    }

    public function addMahasiswa($data)
    {
        return DB::table('tb_mahasiswa')->insert($data);
    }

    public function getMahasiswa($id)
    {
        return DB::table('tb_mahasiswa')->where('id', $id)->first();
    }

    public function updateData($data, $id)
    {
        return DB::table('tb_mahasiswa')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('tb_mahasiswa')->where('id', $id)->delete();
    }
}
