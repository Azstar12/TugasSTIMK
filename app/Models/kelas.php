<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'table_kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;
     protected $fillable = [
        'nama_kelas',
        'id_jurusan'
    ];
    public function getDataKelas()
    {
        return DB::table('table_kelas')->get();
    }

    public function addKelas($data)
    {
        return DB::table('table_kelas')->insert($data);
    }

    public function getKelasId($id)
    {
        return DB::table('table_kelas')->where('id_kelas', $id)->first();
    }

    public function updateDataKelas($data, $id)
    {
        return DB::table('table_kelas')->where('id_kelas', $id)->update($data);
    }

    public function deleteDataKelas($id)
    {
        return DB::table('table_kelas')->where('id_kelas', $id)->delete();
    }
     public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }


}
