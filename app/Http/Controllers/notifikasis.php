<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notifikasi;

class notifikasis extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];


        $table = notifikasi::all();

        $data = [
            'akun' => $akun,
            'table' => $table
        ];
        return view('admin/notifikasi/notifikasi', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = notifikasi::all();

        $data = [
            'table' => $table
        ];
        return view('ajax/notifikasi/read', $data);
    }
}
