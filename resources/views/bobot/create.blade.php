@extends('layouts.app')

@section('content')
    <h2 class="text-center">Tambah Bobot</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bobot.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" placeholder="Kode" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
        </div>
        <div class="mb-3">
            <label for="nilai_kriteria" class="form-label">Nilai Kriteria</label>
            <input type="text" name="nilai_kriteria" class="form-control" placeholder="Nilai Kriteria" required>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-100">Tambah Bobot</button>
    </form>
@endsection
