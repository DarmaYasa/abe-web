<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;
use App\pengguna;
use App\auth;

class login extends Controller
{
    public function masuk(){
        return view('login/login');
    }
    public function masukalert($id){
        if ($id == 1){
            $alert = 'Nama Atau Password Belum Tepat';
        }else if ($id == 2){
            $alert = 'Maaf Akun Anda Belum Di Aktivasi oleh super admin ';
        }
        $data = [
            'alert' => $alert,
        ];
        return view('login/login',$data);
    }
    public function proseslogin(Request $req){
        $username = $req->username;
        $password = md5($req->password);

        $validation = admin::where('nama_user',$username)
            ->where('password',$password)
            ->count();
        if ($validation == 1){
            $getuser = admin::where('nama_user',$username)
                ->where('password', $password)
                ->with('admintype:id,nama')
                ->first();
            if ($getuser->isactive == 'iya'){
                $req->session()->push('login', 'yes');
                $req->session()->push('pengguna', $getuser );
                return redirect('/');
            }else{
                return redirect('/login/2');
            }
        }else{
            return redirect('/login/1');
        }
    }
    public function logout(Request $request){
        $value = $request->session()->get('pengguna');
        $logout = auth::where('id_user', $value[0]->id)->delete();
        session()->forget('login');
        session()->forget('pengguna');
        return redirect('/login');
    }
}
