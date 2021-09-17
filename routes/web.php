<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','main@index')->middleware('ceklogin');
Route::get('/login','login@masuk')->middleware('cekformlogin');
Route::get('/login/{id}','login@masukalert')->middleware('cekformlogin');
Route::post('/login/proses','login@proseslogin');
Route::get('/logout','login@logout');

//WEB
Route::get('/admin','admins@main')->middleware('ceklogin');
Route::get('/orangtua','orangtuas@main')->middleware('ceklogin');
Route::get('/orangtua/hubungan/{id}','hubungans@main2')->middleware('ceklogin');
Route::get('/terapis','terapiss@main')->middleware('ceklogin');
Route::get('/pengguna','penggunas@main')->middleware('ceklogin');
Route::get('/feedback','feedbacks@main')->middleware('ceklogin');
Route::get('/pengumuman','pengumumans@main')->middleware('ceklogin');
Route::get('/berita','beritas@main')->middleware('ceklogin');
Route::get('/perkembangan','perkembangans@main')->middleware('ceklogin');
Route::get('/anak','anaks@main')->middleware('ceklogin');
Route::get('/anak/hubungan/{id}','hubungans@main')->middleware('ceklogin');
Route::get('/notifikasi','notifikasis@main')->middleware('ceklogin');
Route::get('/jenisflashcard','jenisflashcards@main')->middleware('ceklogin');
Route::get('/flashcard','flashcards@main')->middleware('ceklogin');
Route::get('/dibagikan','dibagikans@main')->middleware('ceklogin');
Route::get('/perbedaan','perbedaans@main')->middleware('ceklogin');
Route::get('/tentang','tentang@main')->middleware('ceklogin');
Route::get('/profile','profile@main')->middleware('ceklogin');

//POST
Route::get('/test', 'main@test');
Route::get('/test/cari', 'main@testcari');

Route::post('/flashcard/create', 'flashcards@apicreate');
Route::get('/flashcard/apidelete/{id}', 'flashcards@apidelete');
Route::post('/perbedaan/apicreate', 'perbedaans@apicreate');
Route::get('/perbedaan/apidelete/{id}', 'perbedaans@apidelete');

//AJAX



Route::get('/ajax/perbedaan/read','perbedaans@ajaxread');
Route::get('/ajax/perbedaan/delete/{id}','perbedaans@ajaxdelete');
Route::post('/ajax/perbedaan/create','perbedaans@ajaxcreate');

Route::get('/ajax/admin/read','admins@ajaxread');
Route::get('/ajax/admin/delete/{id}','admins@ajaxdelete');
Route::post('/ajax/admin/create','admins@ajaxcreate');
Route::post('/ajax/admin/update','admins@ajaxupdate');

Route::get('/ajax/dibagikan/read','dibagikans@ajaxread');
Route::get('/ajax/dibagikan/accept/{id}','dibagikans@ajaxaccept');
Route::get('/ajax/dibagikan/delete/{id}','dibagikans@ajaxdelete');

Route::get('/ajax/flashcard/read','flashcards@ajaxread');
Route::post('/ajax/flashcard/create','flashcards@ajaxcreate');
Route::get('/ajax/flashcard/delete/{id}','flashcards@ajaxdelete');
Route::post('/ajax/flashcard/update','flashcards@ajaxupdate');

Route::get('/ajax/jenisflashcard/read','jenisflashcards@ajaxread');
Route::post('/ajax/jenisflashcard/create','jenisflashcards@ajaxcreate');
Route::get('/ajax/jenisflashcard/delete/{id}','jenisflashcards@ajaxdelete');
Route::post('/ajax/jenisflashcard/update','jenisflashcards@ajaxupdate');

Route::get('/ajax/orangtua/read','orangtuas@ajaxread');
Route::post('/ajax/orangtua/create','orangtuas@ajaxcreate');
Route::get('/ajax/orangtua/delete/{id}','orangtuas@ajaxdelete');
Route::post('/ajax/orangtua/update','orangtuas@ajaxupdate');
Route::get('/orangtua/cari','orangtuas@search');
Route::get('/ajax/orangtua/hubungan/read/{id}','hubungans@ajaxread2');


Route::get('/ajax/terapis/read','terapiss@ajaxread');
Route::post('/ajax/terapis/create','terapiss@ajaxcreate');
Route::get('/ajax/terapis/delete/{id}','terapiss@ajaxdelete');
Route::post('/ajax/terapis/update','terapiss@ajaxupdate');

Route::get('/ajax/pengguna/read','penggunas@ajaxread');
Route::post('/ajax/pengguna/create/ortu','penggunas@ajaxcreateortu');
Route::post('/ajax/pengguna/create/terapis','penggunas@ajaxcreateterapis');
Route::post('/ajax/pengguna/create/admin','penggunas@ajaxcreateadmin');
Route::get('/ajax/pengguna/delete/{id}','penggunas@ajaxdelete');
Route::post('/ajax/pengguna/update','penggunas@ajaxupdate');

Route::get('/ajax/berita/read','beritas@ajaxread');
Route::post('/ajax/berita/create','beritas@ajaxcreate');
Route::get('/ajax/berita/delete/{id}','beritas@ajaxdelete');
Route::post('/ajax/berita/update','beritas@ajaxupdate');

Route::get('/ajax/pengumuman/read','pengumumans@ajaxread');
Route::post('/ajax/pengumuman/create','pengumumans@ajaxcreate');
Route::get('/ajax/pengumuman/delete/{id}','pengumumans@ajaxdelete');
Route::post('/ajax/pengumuman/update','pengumumans@ajaxupdate');

Route::get('/ajax/anak/read','anaks@ajaxread');
Route::post('/ajax/anak/create','anaks@ajaxcreate');
Route::get('/ajax/anak/delete/{id}','anaks@ajaxdelete');
Route::post('/ajax/anak/update','anaks@ajaxupdate');
Route::get('/ajax/anak/hubungan/read/{id}','hubungans@ajaxread');
Route::post('/ajax/anak/hubungan/create','hubungans@ajaxcreate');
Route::get('/ajax/anak/hubungan/delete/{id}','hubungans@ajaxdelete');
Route::post('/ajax/anak/hubungan/update','hubungans@ajaxupdate');


Route::get('/ajax/notifikasi/read','notifikasis@ajaxread');
Route::get('/ajax/notifikasi/delete/{id}','notifikasis@ajaxdelete');

Route::get('/ajax/perkembangan/read','perkembangans@ajaxread');
Route::get('/ajax/perkembangan/delete/{id}','perkembangans@ajaxdelete');


Route::get('/ajax/feedback/read','feedbacks@ajaxread');
Route::get('/ajax/feedback/delete/{id}','feedbacks@ajaxdelete');


