<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengguna extends Model
{
    use SoftDeletes;

    protected $table = 'users';
    protected $fillable = ['id','nama','nama_user','isactive','id_jenispengguna']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    function jenispengguna() {
        return $this->belongsTo(jenispengguna::class, 'id_jenispengguna', 'id');
    }
}
