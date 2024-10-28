@extends('layouts.app')

@section('content')
    <h2 class="text-center">Daftar UMKM</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('umkm.create') }}" class="btn btn-primary">Tambah UMKM</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Usaha</th>
                <th>Pemilik</th>
                <th>Jalan</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Jenis Usaha</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($umkms as $umkm)
                <tr>
                    <td>{{ $umkm->nama_usaha }}</td>
                    <td>{{ $umkm->pemilik }}</td>
                    <td>{{ $umkm->jalan }}</td>
                    <td>{{ $umkm->desa }}</td>
                    <td>{{ $umkm->kecamatan }}</td>
                    <td>{{ $umkm->jenisUsaha->nama }}</td>
                    <td>
                        <a href="{{ route('umkm.edit', $umkm->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('umkm.destroy', $umkm->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
