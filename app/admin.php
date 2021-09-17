<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Model
{
    use SoftDeletes;
    protected $table = 'admin';
    protected $fillable = ['id','nama','nama_user','telp','email','password','alamat','type']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    function admintype() {
        return $this->belongsTo(admin_type::class, 'type', 'id');
    }
}
