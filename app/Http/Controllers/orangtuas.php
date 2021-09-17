<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orangtua;
use App\pengguna;

class orangtuas extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $table = orangtua::all();

        $data = [
            'akun' => $akun,
            'table' => $table
        ];
        return view('admin/orangtua/orangtua', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = orangtua::all();

        $data = [
            'table' => $table
        ];
        return view('ajax/orangtua/read', $data);
    }
    public function ajaxcreate(Request $req)
    {
        $orangtua = new orangtua;
        $orangtua->nama_orangtua = $req->nama_orangtua;
        $orangtua->kelamin = $req->kelamin;
        $orangtua->pekerjaan = $req->pekerjaan;
        $orangtua->agama = $req->agama;
        $orangtua->alamat = $req->alamat;
        $orangtua->telp = $req->telp;
        $orangtua->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $orangtua = orangtua::find($id);
        $orangtua->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        $orangtua=orangtua::find($req->id);
        $penggunas = pengguna::where('nama',$orangtua->nama_orangtua)->first();
        $penggunas=pengguna::find($penggunas->id);
        $penggunas->nama = $req->nama_orangtua;
        $penggunas->save();

        $orangtua->nama_orangtua = $req->nama_orangtua;
        $orangtua->kelamin = $req->kelamin;
        $orangtua->pekerjaan = $req->pekerjaan;
        $orangtua->agama = $req->agama;
        $orangtua->alamat = $req->alamat;
        $orangtua->telp = $req->telp;
        $orangtua->save();
        echo "sukses";
    }
    public function search(Request $req)
    {
        if ($req->has('q')) {
            $data = orangtua::where('nama_orangtua','like','%'.$req->q.'%')->get();
            return response()->json($data);
        }
    }
}
