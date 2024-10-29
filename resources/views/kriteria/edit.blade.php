@extends('layouts.app')

@section('content')
    <h2 class="text-center">Edit Kriteria</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="bobot_id" class="form-label">Bobot</label>
            <select name="bobot_id" class="form-control" required>
                @foreach($bobots as $bobot)
                    <option value="{{ $bobot->id }}" {{ $bobot->id == $kriteria->bobot_id ? 'selected' : '' }}>{{ $bobot->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_bobot" class="form-label">Nama Bobot</label>
            <input type="text" name="nama_bobot" class="form-control" value="{{ $kriteria->nama_bobot }}" required>
        </div>
        <div class="mb-3">
            <label for="nilai_bobot" class="form-label">Nilai Bobot</label>
            <input type="number" name="nilai_bobot" class="form-control" value="{{ $kriteria->nilai_bobot }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-100">Update Kriteria</button>
    </form>
@endsection
