<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;


class jurusanController extends Controller
{
    public function index()
    {
        $model = new jurusan();
        $jurusan = $model->getDataJurusan();
        return view('jurusan.index', compact('jurusan'));
    }


    public function store()
    {
        return view('jurusan.add');
    }

    public function add(Request $r)
    {


        $model = new jurusan();
        $model->addJurusan(['nama_jurusan' => $r->nama_jurusan]);

        return redirect()->route('admin.jurusan')->with('success', 'data berhasil ditambahkan!');
    }

    public function edit($id)
    {

        $model = new jurusan();
        $jurusan = $model->getJurusanId($id);

        return view('jurusan.edit', compact('jurusan', 'id'));
    }

    public function update(Request $r, $id)
    {

            $data = [
                'nama_jurusan' => $r->nama_jurusan,
            ];
            $model = new jurusan();
            $model->updateDataJurusan($data, $id);

            return redirect()->route('admin.jurusan')->with('success', 'data berhasil diupdate');

    }

    public function delete($id)
    {
        $model = new jurusan();
        $model->deleteDataJurusan($id);

        return redirect()->route('admin.jurusan')->with('success', 'data berhasil di hapus!');
    }
}
