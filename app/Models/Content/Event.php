<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Event extends Model
{
   	protected $table = 'events';
   	public $incrementing = false;
   	protected $fillable = [
   		'judul',
  		'isi',
      'tempat',
  		'tgl_event',
  		'kategori_event_id',
   	];


   	// uuid setup
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }

    public function kategoriEvent() {
      return $this->belongsTo('App\Models\Content\Event');
    }
}
