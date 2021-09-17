<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class berita extends Model
{
    protected $table = 'berita';

    protected $fillable = ['id','judul','deskripsi','attachment']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
}
