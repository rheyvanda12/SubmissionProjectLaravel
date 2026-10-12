<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function profil()
    {
        $nama  = 'Rheyvanda Shevta Ersananda';
        $nim   = '242520086';
        $prodi = 'TEKNOLOGI INFORMASI';

        return view('mahasiswa.profil', compact('nama', 'nim', 'prodi'));
    }
        private function dataMahasiswa(): array
    {
        return [
            ['nama' => 'Rhey',  'nim' => '2301001', 'ipk' => 3.75],
            ['nama' => 'Andi',  'nim' => '2301002', 'ipk' => 3.20],
            ['nama' => 'Budi',  'nim' => '2301003', 'ipk' => 2.80],
            ['nama' => 'Citra', 'nim' => '2301004', 'ipk' => 3.55],
            ['nama' => 'Dewi',  'nim' => '2301005', 'ipk' => 1.90],
        ];
    }

    public function daftar()
    {
        $mahasiswa = $this->dataMahasiswa();

        return view('mahasiswa.daftar', compact('mahasiswa'));
    }
}
