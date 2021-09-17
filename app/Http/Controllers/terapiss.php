<?php

namespace App\Http\Controllers;

use App\pengguna;
use Illuminate\Http\Request;
use App\terapis;

class terapiss extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $table = terapis::all();

        $data = [
            'akun' => $akun,
            'table' => $table
        ];
        return view('admin/terapis/terapis', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = terapis::all();

        $data = [
            'table' => $table
        ];
        return view('ajax/terapis/read', $data);
    }
    public function ajaxcreate(Request $req)
    {
        $terapis = new terapis;
        $terapis->nama_terapis = $req->nama_terapis;
        $terapis->kelamin = $req->kelamin;
        $terapis->agama = $req->agama;
        $terapis->alamat = $req->alamat;
        $terapis->telp = $req->telp;
        $terapis->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $terapis = terapis::find($id);
        $terapis->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {

        $terapis=terapis::find($req->id);
        $penggunas = pengguna::where('nama',$terapis->nama_orangtua)->first();
        $penggunas = pengguna::find($penggunas->id);
        $penggunas->nama = $req->nama_orangtua;
        $penggunas->save();

        $terapis->nama_terapis = $req->nama_terapis;
        $terapis->kelamin = $req->kelamin;
        $terapis->agama = $req->agama;
        $terapis->alamat = $req->alamat;
        $terapis->telp = $req->telp;
        $terapis->save();

        echo "sukses";
    }
}
