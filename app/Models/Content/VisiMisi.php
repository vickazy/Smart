<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misi';
    protected $fillable = [
    	'nama',
		'quote',
		'photo',
		'visi',
		'misi',
    ];
}
