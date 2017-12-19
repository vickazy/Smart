<?php

namespace App\Models\KProdi;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $guard = ['id'];

    protected $fillable = ['siswa_id', 'jurusan_id', 'keterangan'];

    public function siswa() {
    	return $this->belongsTo('App\Models\Ppdb\Siswa');
    }
}
