@extends('layouts.app')

@section('content')
    <h2 class="text-center">Daftar Kriteria</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bobot</th>
                <th>Nama Bobot</th>
                <th>Nilai Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriterias as $kriteria)
                <tr>
                    <td>{{ $kriteria->id }}</td>
                    <td>{{ $kriteria->bobot->nama }}</td>
                    <td>{{ $kriteria->nama_bobot }}</td>
                    <td>{{ $kriteria->nilai_bobot }}</td>
                    <td>
                        <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $kriteria->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop-{{ $kriteria->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display: inline;">
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
