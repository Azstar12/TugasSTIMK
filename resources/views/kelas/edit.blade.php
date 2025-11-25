@extends('index')

@section('content')
    <div class="data-siswa">
        <h4 class="mb-0">Ubah Data Kelas</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.kelas.update', ['id' => $kelas->id_kelas]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                    id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
                                @error('nama_kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_jurusan" class="form-label">Jurusan</label>
                                <select class="form-control @error('id_jurusan') is-invalid @enderror" id="id_jurusan"
                                    name="id_jurusan" required>
                                    <option value="">Pilih Jurusan</option>
                                    @foreach ($jurusan as $jrs)
                                        <option value="{{ $jrs->id_jurusan }}"
                                            @if (old('id_jurusan', isset($kelas) ? $kelas->id_jurusan : '') == $jrs->id_jurusan) selected @endif>
                                            {{ $jrs->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.kelas') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
