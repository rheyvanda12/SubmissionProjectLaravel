<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MahasiswaController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sapa', function () {
    return 'Selamat datang di Aplikasi Perpustakaan Kampus!';
});

// Arrow function (lebih ringkas)
Route::get('/tanggal', fn () => now()->translatedFormat('l, d F Y'));

// Mengembalikan data JSON
Route::get('/info', fn () => [
    'aplikasi' => 'Perpustakaan Kampus',
    'versi' => '1.0',
    'framework' => 'Laravel 13',
]);
// Parameter wajib
Route::get('/anggota/{nama}', function (string $nama) {
    return "Anggota perpustakaan: {$nama}";
});

// Parameter opsional (beri nilai default)
Route::get('/rak/{genre?}', function (?string $genre = 'umum') {
    return "Menampilkan rak buku genre: {$genre}";
});

// Lebih dari satu parameter
Route::get('/buku/{kategori}/tahun/{tahun}', function (string $kategori, int $tahun) {
    return "Buku kategori {$kategori} terbitan tahun {$tahun}";
});
Route::get('/peminjaman/{id}', function (int $id) {
    return "Detail peminjaman nomor {$id}";
})->whereNumber('id');

Route::get('/penulis/{nama}', function (string $nama) {
    return "Penulis: {$nama}";
})->whereAlpha('nama');

Route::get('/isbn/{isbn}', function (string $isbn) {
    return "ISBN: {$isbn}";
})->where('isbn', '[0-9]{13}');

Route::get('/status/{status}', function (string $status) {
    return "Status peminjaman: {$status}";
})->whereIn('status', ['dipinjam', 'dikembalikan', 'terlambat']);

// Route::view tidak memerlukan closure
Route::view('/layanan', 'layanan')->name('layanan');

Route::get('/bantuan', function () {
    return view('bantuan', ['telepon' => '(024) 1234567']);
})->name('bantuan');

Route::prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/beranda', fn () => 'Beranda Petugas')
        ->name('beranda');

    Route::get('/laporan', fn () => 'Laporan Peminjaman')
        ->name('laporan');

    Route::get('/anggota/{id}', fn (int $id) => "Data anggota nomor {$id}")
        ->name('anggota');
});
Route::permanentRedirect('/katalog-lama', '/info');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::resource('produk', ProdukController::class);
Route::get('/profil', [MahasiswaController::class, 'profil'])->name('mahasiswa.profil');
Route::get('/mahasiswa', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'detail'])->name('mahasiswa.detail');
Route::redirect('/home', '/');

// Redirect permanen (kode 301)
Route::permanentRedirect('/katalog-lama', '/info');

// Dieksekusi bila tidak ada route yang cocok (letakkan paling bawah)
Route::fallback(function () {
    return response('Maaf, halaman yang Anda cari tidak tersedia.', 404);
});
