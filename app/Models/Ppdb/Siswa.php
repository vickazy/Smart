<?php

namespace App\Models\Ppdb;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
      'id',
      'nisn',
      'nama',
      // 'nama_panggilan',
      'jenis_kelamin',
      'kelas',
      'jurusan_id',
      // 'tempat_lahir',
      'tgl_lahir',
      // 'agama',
      // 'anak_ke',
      // 'jumlah_saudara',
      // 'tinggal_bersama',
      // 'alamat',
      // 'rt',
      // 'rw',
      // 'kelurahan',
      // 'kecamatan',
      // 'kota',
      // 'kode_pos',
    ];

    // uuid setup
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }

    public function jurusan() {
      return $this->belongsTo('App\Models\KProdi\Jurusan');
    }

    // public function riwayat() {
    //   return $this->hasMany('App\Models\Ppdb\RiwayatP');
    // }

    // public function orangtua() {
    //   return $this->hasMany('App\Models\Ppdb\OrangTua');
    // }
}
