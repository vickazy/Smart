<?php

namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TataTertibController extends Controller
{
    public function tataTertib() {
    	return view('smart.tentang-kami.tata-tertib');
    }
}
