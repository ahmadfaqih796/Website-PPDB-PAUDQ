<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Pendaftaran'
        ];
        return view('pengunjung/pendaftaran', $data);
    }
}
