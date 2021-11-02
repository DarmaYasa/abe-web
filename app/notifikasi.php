<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notifikasi extends Model
{
    protected $table = 'notifikasi';

    protected $fillable = ['id', 'judul', 'deskripsi', 'dibaca', 'dilihat', 'type']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
}
