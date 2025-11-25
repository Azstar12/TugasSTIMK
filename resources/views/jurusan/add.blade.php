@extends('index')

@section('content')
    <div class="data-siswa">
        <h4 class="mb-0">Input Data Jurusan</h4>
        <form action="{{ route('admin.jurusan.insert') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label">Nama Jurusan<span style="color: red"> *</span></label>
                    <input class="form-control" type="text" id="nama_jurusan" name="nama_jurusan" required
                        placeholder="Masukan Nama">
                </div>
                <button class="btn btn-primary">Simpan</button>
                <a href="/admin/jurusan" class="btn btn-outline-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
