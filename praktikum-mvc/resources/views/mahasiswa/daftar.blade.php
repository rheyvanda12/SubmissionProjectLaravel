@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1>Daftar Mahasiswa</h1>
    <table border="1">
        <tr><th>No</th><th>Nama</th><th>NIM</th><th>IPK</th><th>Keterangan</th></tr>
        @forelse ($mahasiswa as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m['nama'] }}</td>
                <td>{{ $m['nim'] }}</td>
                <td>{{ $m['ipk'] }}</td>
                <td>
                    @if ($m['ipk'] >= 3.5) Cum Laude
                    @elseif ($m['ipk'] >= 3.0) Baik
                    @else Perlu ditingkatkan
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada data</td></tr>
        @endforelse
    </table>
@endsection