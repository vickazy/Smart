<?php

namespace App\Http\Controllers\Kontak;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function kontak() {
    	return view('smart.kontak.kontak');
    }
}
