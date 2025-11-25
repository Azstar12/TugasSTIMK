@extends('index')

@section('content')
<div class="data-siswa">
    <h4 class="mb-0">Edit Jurusan</h4>
<form action="{{ route('admin.jurusan.update',['id' => $id]) }}" method="post">
    @csrf
    <div class="card-body">
        <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama <span style="color: red"> *</span></label>
                <input class="form-control" type="text" id="nama_jurusan" name="nama_jurusan" required value="{{ $jurusan->nama_jurusan }}" placeholder="Masukan Nama">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.jurusan') }}" class="btn btn-outline-secondary  ">Kembali</a>
    </div>
</form>
</div>
@endsection
