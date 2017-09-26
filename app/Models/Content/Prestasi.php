<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
	protected $table = 'prestasis';
	protected $fillable = [
		'alamat',
		'email',
		'no_telpon',
		'lat',
		'long',
	];
}
