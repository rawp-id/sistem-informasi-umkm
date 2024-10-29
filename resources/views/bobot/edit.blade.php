@extends('layouts.app')

@section('content')
    <h2 class="text-center">Edit Bobot</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bobot.update', $bobot->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $bobot->kode }}" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $bobot->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="nilai_kriteria" class="form-label">Nilai Kriteria</label>
            <input type="text" name="nilai_kriteria" class="form-control" value="{{ $bobot->nilai_kriteria }}" required>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="benefit" {{ $bobot->tipe == 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost" {{ $bobot->tipe == 'cost' ? 'selected' : '' }}>Cost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-100">Update Bobot</button>
    </form>
@endsection
