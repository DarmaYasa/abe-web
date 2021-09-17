<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class perbedaan extends Model
{
    use SoftDeletes;
    protected $table = 'bedakan_konten';

    protected $fillable = ['id','judul','deskripsi','id_flashcard','id_user']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    function pengguna() {
        return $this->belongsTo(pengguna::class, 'id_user', 'id');
    }

}
