<?php

namespace App\Http\Controllers;

use App\notifikasi;
use Illuminate\Http\Request;
use App\pengumuman;
use Illuminate\Support\Facades\Http;

class pengumumans extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];


        $table = pengumuman::all();

        $data = [
            'akun' => $akun,
            'table' => $table
        ];
        return view('admin/pengumuman/pengumuman', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = pengumuman::all();

        $data = [
            'table' => $table
        ];
        return view('ajax/pengumuman/read', $data);
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

        $pengumuman = new pengumuman;
        $pengumuman->judul = $req->judul;
        $pengumuman->deskripsi = $req->deskripsi;
        $sampul = $req->file('file');
        $sampul->move(public_path('UploadedFile/pengumuman/'),time().'_'.$sampul->getClientOriginalName());
        $pengumuman->attachment = time().'_'.$sampul->getClientOriginalName();
        $pengumuman->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $pengumuman = pengumuman::find($id);
        unlink(public_path('UploadedFile/pengumuman/'.$pengumuman->attachment));
        $pengumuman->delete();
        echo "sukses";
    }
    public function ajaxupdate(Request $req)
    {
        $pengumuman=pengumuman::find($req->id);
        $pengumuman->judul = $req->judul;
        $pengumuman->deskripsi = $req->deskripsi;
        $sampul = $req->file('file');
        if (isset($sampul)){
            unlink(public_path('UploadedFile/pengumuman/'.$pengumuman->attachment));
            $sampul->move(public_path('UploadedFile/pengumuman/'),time().'_'.$sampul->getClientOriginalName());
            $pengumuman->attachment = time().'_'.$sampul->getClientOriginalName();
        }
        $pengumuman->save();
        echo "sukses";
    }
}
