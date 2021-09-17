<?php

namespace App\Http\Controllers;

use App\jenisflashcard;
use App\flashcard;
use App\pengguna;
use App\auth;
use Illuminate\Http\Request;

class flashcards extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];


        $table = flashcard::all();
        $pengguna = pengguna::all();
        $jenisflashcard = jenisflashcard::all();

        $data = [
            'akun' => $akun,
            'table' => $table,
            'jenisflashcard' => $jenisflashcard,
            'pengguna' => $pengguna

        ];
        return view('admin/flashcard/flashcard', $data);
    }
    public function ajaxread(Request $req)
    {
//        $table = flashcard::all();
        $table = flashcard::
        with('jenisflashcard:id,nama')
            ->with('pengguna:id,nama,id_jenispengguna,nama_user')
            ->get();
        $data = [
            'table' => $table,
        ];
        return view('ajax/flashcard/read', $data);
    }
    public function ajaxcreate(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $idpengguna = $value[0]['id'];

        $flashcard = new flashcard;
        $flashcard->judul = $req->judul;
        $flashcard->deskripsi = $req->deskripsi;
        $flashcard->id_jenis = $req->id_jenis;
        $gambar = $req->file('file');
        $gambar->move(public_path('UploadedFile/flashcard/'),time().'_'.$gambar->getClientOriginalName());
        $flashcard->attachment = time().'_'.$gambar->getClientOriginalName();
        $flashcard->status = 'valid';
        $flashcard->id_user = $idpengguna;
        $flashcard->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $flashcard = flashcard::find($id);

        unlink(public_path('UploadedFile/flashcard/'.$flashcard->attachment));
        $flashcard->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $idpengguna = $value[0]['id'];

        $flashcard=flashcard::find($req->id);
        $flashcard->judul = $req->judul;
        $flashcard->deskripsi = $req->deskripsi;
        $flashcard->id_jenis = $req->id_jenis;

        $gambar = $req->file('file');
        if (isset($gambar)){
            unlink(public_path('UploadedFile/flashcard/'.$flashcard->attachment));
            $gambar->move(public_path('UploadedFile/flashcard/'),time().'_'.$gambar->getClientOriginalName());
            $flashcard->attachment = time().'_'.$gambar->getClientOriginalName();
        }
        $flashcard->status = $req->status;
        $flashcard->id_user = $idpengguna;
        $flashcard->save();
        echo "sukses";
    }
    public function apicreate(Request $req)
    {

        $validation = auth::where('id_user',$req->id_user)->count();

        if ($validation >= 1){
            $user = pengguna::where('id', $req->id_user)
                ->with('jenispengguna:id,nama')
                ->first();
            if ($user->jenispengguna->nama == 'orang tua'){
                $flashcard = new flashcard;
                $flashcard->judul = $req->judul;
                $flashcard->deskripsi = $req->deskripsi;
                $flashcard->id_jenis = $req->id_jenis;
                $gambar = $req->file('file');
                $gambar->move(public_path('UploadedFile/flashcard/'),time().'_'.$gambar->getClientOriginalName());
                $flashcard->attachment = time().'_'.$gambar->getClientOriginalName();
                $flashcard->status = 'invalid';
                $flashcard->id_user = $req->id_user;
                $flashcard->save();
            }elseif ($user->jenispengguna->nama == 'terapis'){
                $flashcard = new flashcard;
                $flashcard->judul = $req->judul;
                $flashcard->deskripsi = $req->deskripsi;
                $flashcard->id_jenis = $req->id_jenis;
                $gambar = $req->file('file');
                $gambar->move(public_path('UploadedFile/flashcard/'),time().'_'.$gambar->getClientOriginalName());
                $flashcard->attachment = time().'_'.$gambar->getClientOriginalName();
                $flashcard->status = 'invalid';
                $flashcard->id_user = $req->id_user;
                $flashcard->save();
            }
            $data = [
                'status' => 'Success',
                'message' => 'Data Berhasil Di tambahkan',
                'data' => $user
            ];
            return $data;
        }else{
            $data = [
                'status' => 'Error',
                'message' => 'Akun Belum Login',
                'data' => ''
            ];
            return $data;
        }
    }
    public function apidelete($id)
    {
        $flashcard = flashcard::find($id);

        unlink(public_path('UploadedFile/flashcard/'.$flashcard->attachment));
        $flashcard->delete();
        echo "sukses";
    }

}
