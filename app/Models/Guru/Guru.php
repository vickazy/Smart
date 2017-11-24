<?php

namespace App\Models\Guru;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
	use Notifiable;

    protected $table = 'gurus';

    protected $fillable = [
		'nama',
        'username',
        'password',
		'bidang',
		'photo',
    ];
}
