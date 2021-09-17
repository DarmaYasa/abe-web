<?php

namespace App\Http\Controllers;

use App\anak;
use App\terapis;
use App\orangtua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class anaks extends Controller

{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $table = anak::all();

        $data = [
            'akun' => $akun,
            'table' => $table,
        ];
        return view('admin/anak/anak', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = anak::all();
        $data = [
            'table' => $table,
        ];
        return view('ajax/anak/read', $data);
    }
    public function ajaxcreate(Request $req)
    {
        $anak = new anak;
        $anak->nama_anak = $req->nama_anak;
        $anak->kelamin = $req->kelamin;
        $anak->tempat_lahir = $req->tempat_lahir;
        $anak->tanggal_lahir = $req->tanggal_lahir;
        $anak->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $anak = anak::find($id);
        $anak->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        $anak=anak::find($req->id);
        $anak->kelamin = $req->kelamin;
        $anak->tempat_lahir = $req->tempat_lahir;
        $anak->tanggal_lahir = $req->tanggal_lahir;
        $anak->save();
        echo "sukses";
    }
}
