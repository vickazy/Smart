<?php
namespace App\Http\Controllers\Galeri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    public function galeri() {
    	return view('smart.galeri.galeri');
    }
}
