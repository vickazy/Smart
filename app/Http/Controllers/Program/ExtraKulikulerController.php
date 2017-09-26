<?php

namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExtraKulikulerController extends Controller
{
    public function extraKulikuler() {
    	return view('smart.program.extra-kulikuler');
    }
}
