<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HargaProduk extends Component
{
    public function __construct(public int $nilai, public bool $diskon = false) {}

    public function format(): string
    {
        return 'Rp ' . number_format($this->diskon ? $this->nilai * 0.9 : $this->nilai, 0, ',', '.');
    }

    public function render()
    {
        return view('components.harga-produk');
    }
}