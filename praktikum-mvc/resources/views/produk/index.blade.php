@extends('layouts.app')                          

@section('title', 'Daftar Produk')               

@section('content')       
<h1>Daftar Produk</h1>
<table border="1">
    <tr><th>No</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
    @forelse ($produk as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p['nama'] }}</td>
            <td>Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
            <td>
                @if ($p['stok'] > 10) Aman
                @elseif ($p['stok'] > 0) Menipis
                @else Habis
                @endif
            </td>
            <td><a href="{{ route('produk.show', $p['id']) }}">Detail</a></td>
        </tr>
    @empty
        <tr><td colspan="5">Belum ada produk.</td></tr>
    @endforelse
</table>
<h2>Demo Komponen</h2>

    <x-alert tipe="sukses">Data berhasil disimpan.</x-alert>
    <x-alert tipe="bahaya">Terjadi kesalahan.</x-alert>

    <x-kartu>
        <x-slot:judul>Keyboard</x-slot:judul>
        Harga <x-harga-produk :nilai="150000" :diskon="true" />
    </x-kartu>
@endsection                                      

@push('styles')
    <style>
        .alert { padding: 10px; margin: 10px 0; }
        .alert-sukses { background: #d4edda; }
        .alert-bahaya { background: #f8d7da; }
        .alert-info { background: #d1ecf1; }
        .kartu { border: 1px solid #999; padding: 10px; margin: 10px 0; }
    </style>
@endpush

@push('scripts')                                 
    <script>console.log('produk dimuat');</script>
@endpush