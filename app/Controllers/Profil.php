<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Profil'
        ];
        return view('pengunjung/profil', $data);
    }
}
