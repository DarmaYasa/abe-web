<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feedback;

class feedbacks extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];


        $table = feedback::all();

        $data = [
            'akun' => $akun,
            'table' => $table
        ];
        return view('admin/feedback/feedback', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = feedback::
        with('pengguna:id,nama_user')
            ->get();

        $data = [
            'table' => $table
        ];
        return view('ajax/feedback/read', $data);
    }
    public function ajaxdelete( $id)
    {
        $feedback = feedback::find($id);
        $feedback->delete();
        echo "sukses";
    }
}
