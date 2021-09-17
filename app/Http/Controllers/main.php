<?php

namespace App\Http\Controllers;

use App\hubungan;
use App\orangtua;
use App\terapis;
use Illuminate\Http\Request;
use App\anak;
use App\pengguna;

class main extends Controller
{
    public function master(Request $request){
        $value = $request->session()->get('pengguna');
        $namapengguna = $value[0]['nama_user'];
        $data = [
            'akun'=>$namapengguna,
        ];
        return view('master/dashboard',$data);
    }
    public function test(){
        return view('test/test');
    }
    public function testcari(Request $req){
        if ($req->has('q')) {
            $data = orangtua::where('nama_orangtua','like','%'.$req->q.'%')->get();
            return response()->json($data);
        }

    }
//    public function test()
//    {
//        $content = array(
//            "en" => 'Pesan'
//        );
//        $headings = array(
//            "en" => 'judul'
//        );
//        $hashes_array = array();
//        array_push($hashes_array, array(
//            "id" => "like-button",
//            "text" => "Like",
//            "icon" => "http://i.imgur.com/N8SN8ZS.png",
//            "url" => "https://yoursite.com"
//        ));
//        array_push($hashes_array, array(
//            "id" => "like-button-2",
//            "text" => "Like2",
//            "icon" => "http://i.imgur.com/N8SN8ZS.png",
//            "url" => "https://yoursite.com"
//        ));
//        $fields = array(
//            'app_id' => "ff9ceaf5-eb89-4769-b887-cebb20219544",
//            'included_segments' => array(
//                'Subscribed Users'
//            ),
//            'data' => array(
//                "foo" => "bar"
//            ),
//            'contents' => $content,
//            'headings' => $headings,
//            'web_buttons' => $hashes_array
//        );
//
//        $fields = json_encode($fields);
//        // print("\nJSON sent:\n");
//        // print($fields);
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//            'Content-Type: application/json; charset=utf-8',
//            'Authorization: Basic NTYwOWI3YmEtYWNmOS00ZDJmLTkxYTYtZGZkMGNhMGQzOTBh'
//        ));
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, FALSE);
//        curl_setopt($ch, CURLOPT_POST, TRUE);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        return $response;
//    }
    public function index(Request $request){
        $value = $request->session()->get('pengguna');
        $namapengguna = $value[0];

        $pengguna = pengguna::count();

        $data = [
            'akun'=>$namapengguna,
            'pengguna'=>$pengguna,
        ];
        return view('admin/home/index',$data);
    }

}
