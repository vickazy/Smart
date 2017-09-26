<?php

namespace App\Http\Controllers\Ebook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EbookController extends Controller
{
    public function ebook() {
    	return view('smart.ebook.ebook');
    }
}
