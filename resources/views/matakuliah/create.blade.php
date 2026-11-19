<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Tambah Mata Kuliah</title></head>
<body>
    <h1>Tambah Mata Kuliah</h1>

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf

        <div>
            <label>Kode Mata Kuliah</label>
            <input type="text" name="kode_matakuliah" value="{{ old('kode_matakuliah') }}">
            @error('kode_matakuliah') <p style="color:red">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama_matakuliah" value="{{ old('nama_matakuliah') }}">
            @error('nama_matakuliah') <p style="color:red">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>SKS</label>
            <input type="number" name="sks" value="{{ old('sks') }}">
            @error('sks') <p style="color:red">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('matakuliah.index') }}">Kembali</a>
    </form>
</body>
</html>