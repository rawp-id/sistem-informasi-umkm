@extends('layouts.app')

@section('content')
    <h2 class="text-center">Tambah UMKM</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('umkm.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Usaha</label>
            <input type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pemilik</label>
            <input type="text" name="pemilik" class="form-control" placeholder="Pemilik" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jalan</label>
            <input type="text" name="jalan" class="form-control" placeholder="Jalan" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Desa</label>
            <input type="text" name="desa" class="form-control" placeholder="Desa" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Usaha</label>
            <select class="form-select" name="jenis_usaha_id" required>
                <option value="">Pilih Jenis Usaha</option>
                @foreach ($jenisUsahas as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-100">Tambah UMKM</button>
    </form>
@endsection
