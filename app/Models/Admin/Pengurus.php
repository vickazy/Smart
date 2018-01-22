<?php

namespace App\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengurus extends Authenticatable
{
    use Notifiable;

    protected $table = 'pengurus';

    protected $fillable = ['username', 'password'];
}
