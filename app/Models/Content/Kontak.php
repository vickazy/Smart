<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';
    protected $fillabel = [
    	'alamat',
		'email',
		'no_telpon',
		'lat',
		'long',
    ];
}
