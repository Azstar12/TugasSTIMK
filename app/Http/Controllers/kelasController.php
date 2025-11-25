<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use App\Models\jurusan;
use Illuminate\Support\Facades\DB;

class kelasController extends Controller
{
    public function index()
    {
        $model = new kelas();
        $kelas = $model->with('jurusan')->orderBy('id_kelas', 'desc')->get();
        return view('kelas.index', compact('kelas'));
    }


    public function store()
    {
        $model = new kelas();
        $kelas = $model->getDataKelas();
        $modelJurusan = new jurusan();
        $jurusan = $modelJurusan->getDataJurusan();

        return view('kelas.add', compact('kelas', 'jurusan'));
    }

    public function add(Request $r)
    {

        $data = [
            'nama_kelas' => $r->nama_kelas,
            'id_jurusan' => $r->id_jurusan,
        ];

        $model = new kelas();
        $model->addKelas($data);



        return redirect()->route('admin.kelas')->with('success', 'data berhasil ditambahkan!');
    }

    public function edit($id)
    {

        $model = new kelas();
        $kelas = $model->getKelasId($id);

        $modelJurusan = new jurusan();
        $jurusan = $modelJurusan->getDataJurusan();

        return view('kelas.edit', compact('kelas', 'jurusan','id'));
    }

    public function update(Request $r, $id)
    {

        $data = [
            'nama_kelas' => $r->nama_kelas,
            'id_jurusan' => $r->id_jurusan,
        ];
        $model = new kelas();
        $model->updateDataKelas($data, $id);

        return redirect()->route('admin.kelas')->with('success', 'data berhasil diupdate');
    }


    public function delete($id)
    {
        $model = new kelas();
        $model->deleteDataKelas($id);

        return redirect()->route('admin.kelas')->with('success', 'data berhasil di hapus!');
    }
}
