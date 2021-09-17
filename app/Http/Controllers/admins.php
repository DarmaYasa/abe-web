<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\admin_type;

class admins extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $table = admin::with('admintype:id,nama')->get();

        $data = [
            'akun' => $akun,
            'table' => $table,
        ];
        return view('admin/admin/admin', $data);
    }
    public function ajaxread(Request $req){
        $table = admin::with('admintype:id,nama')->get();
        $data = [
            'table' => $table,
        ];

        return view('ajax/admin/read', $data);
    }
    public function ajaxdelete( $id)
    {
        $admin = admin::find($id);
        $admin->delete();
        echo "sukses";
    }
    public function ajaxcreate(Request $req)
    {
        $same = admin::where('nama_user',$req->nama_user)->count();
        if ($same >= 1){
            echo 'Nama Pengguna Sudah Ada';
        }else{
            $admin = new admin;
            $admin->nama = $req->nama;
            $admin->nama_user = $req->nama_user;
            $admin->email = $req->email;
            $admin->alamat = $req->alamat;
            $admin->telp = $req->telp;
            $admin->type = 2;
            $admin->isactive = $req->isactive;
            $admin->password = md5($req->password);
            $admin->save();
            echo "sukses";
        }
    }
    public function ajaxupdate(Request $req){
        $exe = false;
        $sameId = admin::find($req->id);
        $same = admin::where('nama_user',$req->nama_user)->count();
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
            if (isset($req->passnew)){
                $admin=admin::find($req->id);
                $admin->nama = $req->nama;
                $admin->nama_user = $req->nama_user;
                $admin->email = $req->email;
                $admin->alamat = $req->alamat;
                $admin->telp = $req->telp;
                $admin->isactive = $req->isactive;
                $admin->password = md5($req->passnew);
                $admin->save();
                echo "sukses";
            }else{
                $admin=admin::find($req->id);
                $admin->nama = $req->nama;
                $admin->nama_user = $req->nama_user;
                $admin->email = $req->email;
                $admin->alamat = $req->alamat;
                $admin->telp = $req->telp;
                $admin->isactive = $req->isactive;
                $admin->save();
                echo "sukses";
            }
        }
    }
}
