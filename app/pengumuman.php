<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{

    protected $table = 'pengumuman';

    protected $fillable = ['id','judul','deskripsi','attachment']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
}
