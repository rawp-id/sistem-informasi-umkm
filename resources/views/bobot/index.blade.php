@extends('layouts.app')

@section('content')
    <h2 class="text-center">Daftar Bobot</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('bobot.create') }}" class="btn btn-primary">Tambah Bobot</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Nilai Kriteria</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bobots as $bobot)
                <tr>
                    <td>{{ $bobot->id }}</td>
                    <td>{{ $bobot->kode }}</td>
                    <td>{{ $bobot->nama }}</td>
                    <td>{{ $bobot->nilai_kriteria }}</td>
                    <td>{{ $bobot->tipe }}</td>
                    <td>
                        <a href="{{ route('bobot.edit', $bobot->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $bobot->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop-{{ $bobot->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pesan</h1>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah Anda Yakin Untuk Menghapus?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <form action="{{ route('bobot.destroy', $bobot->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
