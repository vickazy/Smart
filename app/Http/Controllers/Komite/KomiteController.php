<?php

namespace App\Http\Controllers\Komite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KomiteController extends Controller
{
    public function komite() {
    	return view("smart.komite.komite");
    }
}
