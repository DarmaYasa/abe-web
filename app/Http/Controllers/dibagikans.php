<?php

namespace App\Http\Controllers;

use App\flashcard;
use Illuminate\Http\Request;
use App\dibagikan;

class dibagikans extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $data = [
            'akun' => $akun,

        ];
        return view('admin/dibagikan/dibagikan', $data);
    }
    public function ajaxread(Request $req)
    {
//        $table = pengguna::all();
        $table = dibagikan::
        with('flashcard:id,judul,attachment,status')
            ->with('penerima:id,nama_user,id_jenispengguna')
            ->with('pengirim:id,nama_user,id_jenispengguna')
            ->get();
        $data = [
            'table' => $table
        ];
        return view('ajax/dibagikan/read', $data);
    }
    public function ajaxaccept($id)
    {
        $flashcard=flashcard::find($id);
        $flashcard->status = 'valid';
        $flashcard->save();

        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $dibagikan = dibagikan::find($id);
        $dibagikan->delete();
        echo "sukses";
    }
    public function apicreate(Request $req){

    }
    public function apidelete(Request $req){

    }
}
