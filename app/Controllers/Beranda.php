<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Beranda',
            'nama' => $this->name
        ];
        return view('pengunjung/beranda', $data);
    }
}
