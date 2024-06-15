@extends('index')

@section('content')
<div class="data-siswa">
                <h4 class="mb-0">Input Data Siswa</h4>
            <form action="/insert/siswa" method="post">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nis" class="form-label">NIS <span style="color: red"> *</span></label>
                            <input class="form-control" type="number" id="nis" name="nis" required placeholder="Masukan NIS">
                        </div>
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama <span style="color: red"> *</span></label>
                            <input class="form-control" type="text" id="nama" name="nama" required placeholder="Masukan Nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir <span style="color: red"> *</span></label>
                            <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" required placeholder="Masukan Tempat Lahir">
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir <span style="color: red"> *</span></label>
                            <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah <span style="color: red"> *</span></label>
                            <input class="form-control" type="text" id="asal_sekolah" name="asal_sekolah" required placeholder="Masukan Asal Sekolah">
                        </div>
                        <div class="col-md-6">
                            <label for="no_telepon" class="form-label">No Telepon <span style="color: red"> *</span></label>
                            <input class="form-control" type="text" id="no_telepon" name="no_telepon" required placeholder="Masukan No Telepon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <span style="color: red"> *</span></label>
                        <textarea class="form-control" id="alamat" name="alamat" required placeholder="Masukan Alamat anda"></textarea>
                    </div>
                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary  ">Kembali</a>
                </div>
            </form>
</div>
@endsection
