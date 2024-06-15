@extends('index')

@section('content')
<div class="data-siswa">
    <h4>Data Siswa</h4>
    <a href="/add/siswa" class="btn btn-primary btn-tambah">Tambah Data</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Asal Sekolah</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
            <tr>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->tempat_lahir }}</td>
                <td>{{ \Carbon\Carbon::parse($data->tgl_lahir)->format('d-m-Y') }}</td>
                <td>{{ $data->asal_sekolah }}</td>
                <td>{{ $data->no_telepon }}</td>
                <td>{{ $data->alamat }}</td>
                <td>
                    <a href="/edit/siswa/{{ $data->id }}" class="btn btn-icon btn-sm btn-success waves-effect waves-light ml-1">  
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="/delete/siswa/{{ $data->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-icon btn-sm btn-danger waves-effect waves-light ml-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection