@extends('index')

@section('content')
    <div class="data-siswa">
        <h4>Data Jurusan</h4>
        <a href="{{ route('admin.jurusan.add') }}" class="btn btn-primary btn-tambah">Tambah Data</a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Jurusan</th>
                    <th>Nama Jurusan</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurusan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id_jurusan }}</td>
                        <td>{{ $item->nama_jurusan }}</td>
                        <td>
                            @if (is_object($item->created_at) && method_exists($item->created_at, 'format'))
                                {{ $item->created_at->format('d/m/Y H:i') }}
                            @else
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.jurusan.edit', $item->id_jurusan) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.jurusan.delete', $item->id_jurusan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus jurusan?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data jurusan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
