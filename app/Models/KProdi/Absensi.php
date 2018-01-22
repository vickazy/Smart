<?php

namespace App\Models\KProdi;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = ['siswa_id', 'jurusan_id', 'keterangan', 'tgl'];

    public function siswa() {
    	return $this->belongsTo('App\Models\Ppdb\Siswa');
    }
}
