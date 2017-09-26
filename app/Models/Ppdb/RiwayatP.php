<?php

namespace App\Models\Ppdb;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class RiwayatP extends Model
{
    protected $table = 'riwayat_p_siswa';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
      'id',
      'siswa_id',
      'asal_sekolah',
      'alamat_sekolah',
      'nisn'
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
