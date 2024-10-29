@extends('layouts.app')

@section('content')
    <h2 class="text-center">Hasil Matriks Normalisasi</h2>
    <p>[Note: B = Benefit, C = Cost]</p>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Usaha</th>
                <th>N1 - Jenis Usaha [B]</th>
                <th>N2 - Jumlah Pekerja [B]</th>
                <th>N3 - Modal Usaha [C]</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($normalizedData as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data['nama_usaha'] }}</td>
                    <td>{{ number_format($data['C1'], 3) }}</td>
                    <td>{{ number_format($data['C2'], 3) }}</td>
                    <td>{{ number_format($data['C3'], 3) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-center mt-5">Hasil Perankingan</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Usaha</th>
                <th>Hasil Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rankings as $index => $ranking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ranking['nama_usaha'] }}</td>
                    <td>{{ number_format($ranking['hasil_nilai'], 3) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
