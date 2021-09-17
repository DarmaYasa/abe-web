<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dibagikan extends Model
{
    use SoftDeletes;
    protected $table = 'flashcard_dibagikan';

    protected $fillable = ['id','id_flashcard','id_pengirim','id_penerima']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    function flashcard() {
        return $this->belongsTo(flashcard::class, 'id_flashcard', 'id');
    }
    function pengirim() {
        return $this->belongsTo(pengguna::class, 'id_pengirim', 'id');
    }
    function penerima() {
        return $this->belongsTo(pengguna::class, 'id_penerima', 'id');
    }
}
