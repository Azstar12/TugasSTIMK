<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class jurusan extends Model
{
    use HasFactory;
    protected $table = 'table_jurusan';
    protected $primaryKey = 'id_jurusan';
    public $timestamps = true;
    protected $fillable = [
        'nama_jurusan',
    ];
    public function getDataJurusan()
    {
        //untuk mengambil semua data jurusan
        return DB::table('table_jurusan')->get();
    }
    public function addJurusan($data)
    {
        //untuk menambahkan data jurusan
        return DB::table('table_jurusan')->insert($data);
    }
    public function getJurusanId($id)
    {
        //untuk mengambil data jurusan berdasarkan id
        return DB::table('table_jurusan')->where('id_jurusan', $id)->first();
    }
    public function updateDataJurusan($data, $id)
    {
        //untuk mengupdate data jurusan
        return DB::table('table_jurusan')->where('id_jurusan', $id)->update($data);
    }
    public function deleteDataJurusan($id)
    {
        //untuk menghapus data jurusan
        return DB::table('table_jurusan')->where('id_jurusan', $id)->delete();
    }
    public function kelas()
    {
        //relasi one to many dengan model kelas
        return $this->hasMany(kelas::class, 'id_jurusan', 'id_jurusan');
    }
}
