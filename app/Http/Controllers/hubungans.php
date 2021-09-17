<?php

namespace App\Http\Controllers;
use App\hubungan;
use App\orangtua;
use App\anak;
use Illuminate\Http\Request;

class hubungans extends Controller
{
    public function main(Request $req,$id){
        $value = $req->session()->get('pengguna');
        $akun = $value[0];
        $orangtua = orangtua::all();
        $data = [
            'akun' => $akun,
            'id'=> $id,
            'orangtua' => $orangtua,
        ];
        return view('admin/anak/hubungan/hubungan', $data);
    }
    public function main2(Request $req,$id){
        $value = $req->session()->get('pengguna');
        $akun = $value[0];
        $anak = anak::all();
        $data = [
            'akun' => $akun,
            'id'=> $id,
            'anak' => $anak,
        ];
        return view('admin/orangtua/hubungan/hubungan', $data);
    }

    public function ajaxread(Request $req,$id)
    {
        $table = hubungan::with('anak:id,nama_anak')
            ->with('orangtua:id,nama_orangtua')
            ->where('id_anak',$id)
            ->get();

        $data = [
            'table' => $table,
        ];
        return view('ajax/anak/hubungan/read', $data);
    }
    public function ajaxread2(Request $req,$id)
    {
        $table = hubungan::with('anak:id,nama_anak')
            ->with('orangtua:id,nama_orangtua')
            ->where('id_orangtua',$id)
            ->get();

        $data = [
            'table' => $table,
        ];
        return view('ajax/orangtua/hubungan/read', $data);
    }


    public function ajaxcreate(Request $req)
    {
        $hubungan = new hubungan;
        $hubungan->id_anak = $req->anak;
        $hubungan->id_orangtua = $req->nama_orangtua;
        $hubungan->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $hubungan = hubungan::find($id);
        $hubungan->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        if (isset($req->nama_orangtua)){
            $hubungan=hubungan::find($req->id);
            $hubungan->id_anak = $req->id_anak;
            $hubungan->id_orangtua = $req->nama_orangtua;
            $hubungan->save();
            echo "sukses";
        }else{
            $hubungan=hubungan::find($req->id);
            $hubungan->id_anak = $req->id_anak;
            $hubungan->save();
            echo "sukses";
        }



    }


}
