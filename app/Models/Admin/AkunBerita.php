<?php

namespace App\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AkunBerita extends Authenticatable
{
    use Notifiable;

    protected $table = 'akun_berita';

    protected $fillable = ['username', 'password'];
}
