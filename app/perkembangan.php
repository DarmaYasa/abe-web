<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perkembangan extends Model
{

    protected $table = 'perkembangan_anak';

    protected $fillable = ['id','judul','deskripsi','id_terapis','id_anak']; //whitelist == yang diperbolehkan
    protected $primaryKey = 'id';

    function anak() {
        return $this->belongsTo(anak::class, 'id_anak', 'id');
    }

    function terapis() {
        return $this->belongsTo(terapis::class, 'id_terapis', 'id');
    }
}
