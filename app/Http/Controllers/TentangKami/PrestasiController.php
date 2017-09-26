<?php
namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrestasiController extends Controller
{
    public function prestasi() {
    	return view('smart.tentang-kami.prestasi');
    }
}
