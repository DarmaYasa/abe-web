<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class admin_type extends Model
{
    use SoftDeletes;
    protected $table = 'admin_type';
    protected $fillable = ['id','nama']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
}
