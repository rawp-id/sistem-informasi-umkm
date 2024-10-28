@extends('layouts.app')

@section('content')
    <h2 class="text-center">Tambah Jenis Usaha</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('jenis-usaha.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jenis Usaha</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Jenis Usaha" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-100">Tambah Jenis Usaha</button>
    </form>
@endsection
