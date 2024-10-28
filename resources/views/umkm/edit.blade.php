@extends('layouts.app')

@section('content')
    <h2 class="text-center">Edit UMKM</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('umkm.update', $umkm->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Usaha</label>
            <input type="text" name="nama_usaha" class="form-control" value="{{ $umkm->nama_usaha }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pemilik</label>
            <input type="text" name="pemilik" class="form-control" value="{{ $umkm->pemilik }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jalan</label>
            <input type="text" name="jalan" class="form-control" value="{{ $umkm->jalan }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Desa</label>
            <input type="text" name="desa" class="form-control" value="{{ $umkm->desa }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" value="{{ $umkm->kecamatan }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Usaha</label>
            <select class="form-select" name="jenis_usaha_id" required>
                @foreach ($jenisUsahas as $jenis)
                    <option value="{{ $jenis->id }}" {{ $jenis->id == $umkm->jenis_usaha_id ? 'selected' : '' }}>
                        {{ $jenis->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-100">Update UMKM</button>
    </form>
@endsection
