<?php

namespace App\Http\Controllers;

use App\jenisflashcard;
use Illuminate\Http\Request;

class jenisflashcards extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];


        $data = [
            'akun' => $akun,

        ];
        return view('admin/jenisflashcard/jenisflashcard', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = jenisflashcard::all();


        $data = [
            'table' => $table
        ];
        return view('ajax/jenisflashcard/read', $data);
    }
    public function ajaxcreate(Request $req)
    {

        $jenisflashcard = new jenisflashcard;
        $jenisflashcard->nama = $req->nama;
        $sampul = $req->file('file');
        $sampul->move(public_path('UploadedFile/jenisflashcard/'),time().'_'.$sampul->getClientOriginalName());
        $jenisflashcard->attachment = time().'_'.$sampul->getClientOriginalName();
        $jenisflashcard->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $jenisflashcard = jenisflashcard::find($id);
        unlink(public_path('UploadedFile/jenisflashcard/'.$jenisflashcard->attachment));
        $jenisflashcard->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        $jenisflashcard=jenisflashcard::find($req->id);
        $jenisflashcard->nama = $req->nama;
        $sampul = $req->file('file');
        if (isset($sampul)){
            unlink(public_path('UploadedFile/jenisflashcard/'.$jenisflashcard->attachment));
            $sampul->move(public_path('UploadedFile/jenisflashcard/'),time().'_'.$sampul->getClientOriginalName());
            $jenisflashcard->attachment = time().'_'.$sampul->getClientOriginalName();
        }
        $jenisflashcard->save();
        echo "sukses";
    }
}
