<?php

namespace App\Models\KProdi;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KProdi extends Authenticatable
{
	use Notifiable;
	
    protected $table = 'k_prodis';

    public function jurusan() {
    	return $this->belongsTo('App\Models\KProdi\Jurusan');
    }
}
