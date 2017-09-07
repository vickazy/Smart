<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class OrangTua extends Model
{
    protected $table = 'orang_tua';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
      'id',
      'siswa_id',
      'nama',
      'tempat_lahir',
      'tgl_lahir',
      'alamat',
      'pekerjaan',
      'instansi',
      'penghasilan',
      'pendidikan_terakhir',
      'no_hp',
      'email',
    ];

    // uuid setup
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
}
