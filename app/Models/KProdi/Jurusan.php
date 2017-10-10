<?php

namespace App\Models\KProdi;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    public function photo() {
    	return $this->hasMany('App\Models\KProdi\PhotoJurusan', 'jurusan_id', 'id');
    }

    public function event() {
    	return $this->hasMany('App\Models\Content\Event', 'jurusan_id', 'id');
    }
}
