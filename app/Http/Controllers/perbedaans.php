<?php

namespace App\Http\Controllers;

use App\auth;
use App\perbedaan;
use App\pengguna;
use Illuminate\Http\Request;

class perbedaans extends Controller
{
    public function main(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $akun = $value[0];


        $data = [
            'akun' => $akun,
        ];
        return view('admin/bedakan/bedakan', $data);
    }
    public function ajaxread(Request $req)
    {
        $table = perbedaan::
        with('pengguna:id,nama_user')
            ->get();
        $data = [
            'table' => $table
        ];

        return view('ajax/bedakan/read', $data);
    }
    public function ajaxcreate(Request $req)
    {
        $value = $req->session()->get('pengguna');
        $idpengguna = $value[0]['id'];

        $perbedaan = new perbedaan;
        $perbedaan->judul = $req->judul;
        $perbedaan->deskripsi = $req->deskripsi;
        $gambar1 = $req->file('file1');
        $gambar1->move(public_path('UploadedFile/perbedaan/'),time().'_'.$gambar1->getClientOriginalName());
        $perbedaan->attachment1 = time().'_'.$gambar1->getClientOriginalName();
        $gambar2 = $req->file('file2');
        $gambar2->move(public_path('UploadedFile/perbedaan/'),time().'_'.$gambar2->getClientOriginalName());
        $perbedaan->attachment2 = time().'_'.$gambar2->getClientOriginalName();
        $perbedaan->id_user = $idpengguna;
        $perbedaan->save();
        echo "sukses";
    }
    public function ajaxdelete( $id)
    {
        $perbedaan = perbedaan::find($id);
        $perbedaan->delete();
        echo "sukses";
    }
    public function apicreate(Request $req)
    {
        $validation = auth::where('id_user',$req->id_user)->count();
        if ($validation >= 1){
            $user = pengguna::where('id','=',$req->id_user)->first();

            $perbedaan = new perbedaan;
            $perbedaan->judul = $req->judul;
            $perbedaan->deskripsi = $req->deskripsi;
            $gambar1 = $req->file('file1');
            $gambar1->move(public_path('UploadedFile/perbedaan/'),time().'_'.$gambar1->getClientOriginalName());
            $perbedaan->attachment1 = time().'_'.$gambar1->getClientOriginalName();
            $gambar2 = $req->file('file2');
            $gambar2->move(public_path('UploadedFile/perbedaan/'),time().'_'.$gambar2->getClientOriginalName());
            $perbedaan->attachment2 = time().'_'.$gambar2->getClientOriginalName();
            $perbedaan->id_user = $req->id_user;
            $perbedaan->id_jenispengguna = $user['id_jenispengguna'];
            $perbedaan->save();
            $data = [
                'status' => 'Success',
                'message' => 'Data Berhasil Di tambahkan',
                'data' => $perbedaan
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
        $perbedaan = perbedaan::find($id);
        unlink(public_path('UploadedFile/perbedaan/'.$perbedaan->attachment1));
        unlink(public_path('UploadedFile/perbedaan/'.$perbedaan->attachment2));
        $perbedaan->delete();
        echo "sukses";
    }
}
