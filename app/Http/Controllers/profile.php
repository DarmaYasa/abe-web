<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profile extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $data = [
            'akun' => $akun,
        ];
        return view('admin/profile/profile', $data);
    }
}
