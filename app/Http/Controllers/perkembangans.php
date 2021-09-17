<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\perkembangan;
use App\anak;
use App\terapis;

class perkembangans extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];


        $table = perkembangan::all();
        $anak = anak::all();
        $terapis = anak::all();

        $data = [
            'akun' => $akun,
            'table' => $table
        ];
        return view('admin/perkembangan/perkembangan', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = perkembangan::
        with('anak:id,nama_anak')
            ->with('terapis:id,nama_terapis')
            ->get();
        $data = [
            'table' => $table
        ];
        return view('ajax/perkembangan/read', $data);
    }
    public function ajaxdelete($id)
    {
        $perkembangan = perkembangan::find($id);
        $perkembangan->delete();
        echo "sukses";
    }
}
