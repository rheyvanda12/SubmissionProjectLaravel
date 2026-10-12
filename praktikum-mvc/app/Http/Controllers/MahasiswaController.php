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
}