<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\berita;
use App\notifikasi;
use Illuminate\Support\Facades\Http;

class beritas extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];

        $table = berita::all();

        $data = [
            'akun' => $akun,
            'table' => $table
        ];
        return view('admin/berita/berita', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = berita::all();

        $data = [
            'table' => $table
        ];
        return view('ajax/berita/read', $data);
    }
    public function ajaxcreate(Request $req)
    {
        $notifikasi = new notifikasi;
        $notifikasi->judul = $req->judul;
        $notifikasi->deskripsi = $req->deskripsi;
        $notifikasi->dibaca = 0;
        $notifikasi->type = 'Berita';
        $notifikasi->dilihat = 0;
        $notifikasi->save();
        $url = 'http://www.intiru.com/notification/notif.php';

        $response = Http::get($url,[
            'judul' => $req->judul,
            'deskripsi' => $req->deskripsi,
        ]);

        $berita = new berita;
        $berita->judul = $req->judul;
        $berita->deskripsi = $req->deskripsi;
        $sampul = $req->file('file');
        $sampul->move(public_path('UploadedFile/berita/'),time().'_'.$sampul->getClientOriginalName());
        $berita->attachment = time().'_'.$sampul->getClientOriginalName();
        $berita->save();
        echo 'sukses';

    }
    public function ajaxdelete( $id)
    {
        $berita = berita::find($id);
        unlink(public_path('UploadedFile/berita/'.$berita->attachment));
        $berita->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        $berita=berita::find($req->id);
        $berita->judul = $req->judul;
        $berita->deskripsi = $req->deskripsi;
        $sampul = $req->file('file');
        if (isset($sampul)){
            unlink(public_path('UploadedFile/berita/'.$berita->attachment));
            $sampul->move(public_path('UploadedFile/berita/'),time().'_'.$sampul->getClientOriginalName());
            $berita->attachment = time().'_'.$sampul->getClientOriginalName();
        }
        $berita->save();
        echo "sukses";
    }
}
