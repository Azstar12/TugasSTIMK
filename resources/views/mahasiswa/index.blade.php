@extends('index')

@section('content')
    <div class="data-siswa">
        <h4>Data Mahasiswa</h4>

        <!-- Search Form -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('admin.home') }}" method="GET">
                    <div class="input-group">
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari berdasarkan NIM, Nama, Asal Sekolah..."
                               value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fa fa-search"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ route('admin.home') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-times"></i> Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('admin.add') }}" class="btn btn-primary btn-tambah">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>

        <!-- Info Pencarian -->
        @if(request('search'))
            <div class="alert alert-info">
                Menampilkan hasil pencarian untuk: "<strong>{{ request('search') }}</strong>"
                <span class="badge bg-primary">{{ $mahasiswa->total() }} data ditemukan</span>
            </div>
        @endif

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Asal Sekolah</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $data)
                    <tr>
                        <td>{{ $data->nim }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $data->asal_sekolah }}</td>
                        <td>{{ $data->no_telepon }}</td>
                        <td>{{ Str::limit($data->alamat, 30) }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $data->id) }}"
                                class="btn btn-icon btn-sm btn-success waves-effect waves-light"
                                title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.delete', $data->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-icon btn-sm btn-danger waves-effect waves-light ml-1"
                                        title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            @if(request('search'))
                                Tidak ada data yang sesuai dengan pencarian "<strong>{{ request('search') }}</strong>"
                            @else
                                Tidak ada data Mahasiswa
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Menampilkan {{ $mahasiswa->firstItem() }} - {{ $mahasiswa->lastItem() }}
                dari {{ $mahasiswa->total() }} data
            </div>
            <nav>
                {{ $mahasiswa->appends(['search' => request('search')])->links() }}
            </nav>
        </div>
    </div>
@endsection
