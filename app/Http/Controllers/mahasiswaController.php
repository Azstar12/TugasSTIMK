<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $mahasiswa = mahasiswa::when($search, function ($query) use ($search) {
            return $query->where('nim', 'like', "%{$search}%")
                ->orWhere('nama', 'like', "%{$search}%")
                ->orWhere('asal_sekolah', 'like', "%{$search}%")
                ->orWhere('tempat_lahir', 'like', "%{$search}%");
        })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function store()
    {
        return view('mahasiswa.add');
    }

    public function add(Request $r)
    {

        if ($r->nis) {
            $r->validate([
                'nim' => 'required|unique:tb_mahasiswa'
            ]);
        }

        $data = [
            'nim' => $r->nim,
            'nama' => $r->nama,
            'tempat_lahir' => $r->tempat_lahir,
            'tgl_lahir' => $r->tgl_lahir,
            'asal_sekolah' => $r->asal_sekolah,
            'no_telepon' => $r->no_telepon,
            'alamat' => $r->alamat
        ];

        $model = new mahasiswa();
        $model->addMahasiswa($data);

        return redirect()->route('admin.home')->with('success', 'data berhasil ditambahkan!');
    }

    public function edit($id)
    {

        $model = new mahasiswa();
        $mahasiswa = $model->getMahasiswa($id);

        return view('mahasiswa.edit', compact('mahasiswa', 'id'));
    }

    public function update(Request $r, $id)
    {

        $nim = DB::table('tb_mahasiswa')->where('id', $id)->first();

        if ($r->nim == $nim->nim) {
            $data = [
                'nim' => $r->nim,
                'nama' => $r->nama,
                'tempat_lahir' => $r->tempat_lahir,
                'tgl_lahir' => $r->tgl_lahir,
                'asal_sekolah' => $r->asal_sekolah,
                'no_telepon' => $r->no_telepon,
                'alamat' => $r->alamat
            ];
            $model = new mahasiswa();
            $model->updateData($data, $id);

            return redirect()->route('admin.home')->with('success', 'data berhasil diupdate');
        } else {
            $r->validate([
                'nim' => 'required|unique:tb_siswa'
            ]);
            $data = [
                'nim' => $r->nim,
                'nama' => $r->nama,
                'tempat_lahir' => $r->tempat_lahir,
                'tgl_lahir' => $r->tgl_lahir,
                'asal_sekolah' => $r->asal_sekolah,
                'no_telepon' => $r->no_telepon,
                'alamat' => $r->alamat
            ];

            $model = new mahasiswa();
            $model->updateData($data, $id);

            return redirect()->route('admin.home')->with('success', 'data berhasil diupdate');
        }
    }


    public function delete($id)
    {
        $model = new mahasiswa();
        $model->deleteData($id);

        return redirect()->route('admin.home')->with('success', 'data berhasil di hapus!');
    }
}
