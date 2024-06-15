<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siswaController extends Controller
{
    public function index()
    {
        $model = new siswa();
        $siswa = $model->getData();

        return view('siswa.index', compact('siswa'));
    }

    public function store()
    {
        return view('siswa.add');
    }

    public function add(Request $r)
    {

        if ($r->nis) {
            $r->validate([
                'nis' => 'required|unique:tb_siswa'
            ]);
        }

        $data = [
            'nis' => $r->nis,
            'nama' => $r->nama,
            'tempat_lahir' => $r->tempat_lahir,
            'tgl_lahir' => $r->tgl_lahir,
            'asal_sekolah' => $r->asal_sekolah,
            'no_telepon' => $r->no_telepon,
            'alamat' => $r->alamat
        ];

        $model = new siswa();
        $model->addSiswa($data);

        return redirect()->route('home')->with('success', 'data berhasil ditambahkan!');
    }

    public function edit($id)
    {

        $model = new siswa();
        $siswa = $model->getSiswa($id);

        return view('siswa.edit', compact('siswa', 'id'));
    }

    public function update(Request $r, $id)
    {

        $nis = DB::table('tb_siswa')->where('id', $id)->first();

        if ($r->nis == $nis->nis) {
            $data = [
                'nis' => $r->nis,
                'nama' => $r->nama,
                'tempat_lahir' => $r->tempat_lahir,
                'tgl_lahir' => $r->tgl_lahir,
                'asal_sekolah' => $r->asal_sekolah,
                'no_telepon' => $r->no_telepon,
                'alamat' => $r->alamat
            ];
            $model = new siswa();
            $model->updateData($data, $id);

            return redirect('/')->with('success', 'data berhasil diupdate');
        } else {
            $r->validate([
                'nis' => 'required|unique:tb_siswa'
            ]);
            $data = [
                'nis' => $r->nis,
                'nama' => $r->nama,
                'tempat_lahir' => $r->tempat_lahir,
                'tgl_lahir' => $r->tgl_lahir,
                'asal_sekolah' => $r->asal_sekolah,
                'no_telepon' => $r->no_telepon,
                'alamat' => $r->alamat
            ];

            $model = new siswa();
            $model->updateData($data, $id);

            return redirect('/')->with('success', 'data berhasil diupdate');
        }
    }


    public function delete($id)
    {
        $model = new siswa();
        $model->deleteData($id);

        return redirect()->route('home')->with('success', 'data berhasil di hapus!');
    }
}
