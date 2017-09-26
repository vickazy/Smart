<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Berita extends Model
{
    protected $table = 'beritas';
    public $incrementing = false; 
    
    // uuid setup
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }

    public function kategoriBerita() {
    	return $this->belongsTo('App\Models\Content\KategoriBerita');
    }
}
