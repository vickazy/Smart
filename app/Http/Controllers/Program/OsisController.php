<?php
namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OsisController extends Controller
{
    public function osis() {
    	return view('smart.program.osis');
    }
}
