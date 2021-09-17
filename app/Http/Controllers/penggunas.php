<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengguna;
use App\terapis;
use App\orangtua;
use App\jenispengguna;

class penggunas extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $table = pengguna::all();
        $terapis = terapis::all();
        $orangtua = orangtua::all();
        $jenispengguna = jenispengguna::all();

        $data = [
            'akun' => $akun,
            'table' => $table,
            'terapis' => $terapis,
            'orangtua' => $orangtua,
            'jenispengguna' => $jenispengguna,
        ];
        return view('admin/pengguna/pengguna', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = pengguna::
        with('jenispengguna:id,nama')
            ->get();

        $data = [
            'table' => $table
        ];
        return view('ajax/pengguna/read', $data);
    }
    public function ajaxcreateortu(Request $req)
    {
        $same = pengguna::where('nama_user',$req->nama_user)->count();

        if ($same > 0){
            echo "Nama Pengguna Sudah Ada";
        }else{
            $orangtua = orangtua::find($req->id_orangtua)->first();
            $pengguna = new pengguna;
            $pengguna->nama = $orangtua->nama_orangtua;
            $pengguna->nama_user = $req->nama_user;
            $pengguna->password = md5($req->password);
            $pengguna->isactive = $req->isactive;
            $pengguna->id_jenispengguna = 2;
            $pengguna->save();
            echo "sukses";
        }
    }
    public function ajaxcreateterapis(Request $req)
    {
        $same = pengguna::where('nama_user',$req->nama_user)->count();
        if ($same > 0){
            echo "sama";
        }else{
            $terapis = terapis::find($req->id_terapis)->first();
            $pengguna = new pengguna;
            $pengguna->nama = $terapis->nama_terapis;
            $pengguna->nama_user = $req->nama_user;
            $pengguna->password = md5($req->password);
            $pengguna->isactive = $req->isactive;
            $pengguna->id_jenispengguna = 1;
            $pengguna->save();
            echo "sukses";
        }

    }
    public function ajaxdelete($id)
    {
        $orangtua = pengguna::find($id);
        $orangtua->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        $exe = false;
        $sameId = pengguna::find($req->id);
        $same = pengguna::where('nama_user',$req->nama_user)->count();
        if ($same >= 1){
            if ($sameId['nama_user'] == $req->nama_user){
                $exe = true;
            }else{
                echo 'Nama Pengguna Sudah Ada';
            }
        }else{
            $exe = true;
        }
        if ($exe == true){
            $pengguna=pengguna::find($req->id);
            $pengguna->nama_user = $req->nama_user;
            $pengguna->isactive = $req->isactive;
            $pengguna->password = md5($req->passwordn);
            $pengguna->id_jenispengguna = $req->id_jenispengguna;
            $pengguna->save();
            echo "sukses";
        }

    }
}
