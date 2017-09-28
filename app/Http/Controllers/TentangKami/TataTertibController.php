<?php

namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use App\Models\Content\TataTertib;
use Image, File, DB, DataTables;
use App\Http\Controllers\Controller;

class TataTertibController extends Controller
{
    public function tataTertib() {
    	$data = TataTertib::first();
    	return view('smart.tentang-kami.tata-tertib', compact('data'));
    }

    public function adminTataTertib() {
    	$data = TataTertib::first();
    	return view('admin.tata-tertib.index', ['data' => $data]);
    }

    public function postTataTertib(Request $request) {
    	  // dd($request->isi);
    	  $this->validate($request, [
    	  	'isi' => 'required'
    	  ]);

    	  $data = TataTertib::find($request->id);
    	  if ($data == null) {
    	  	  $baru = new TataTertib;
		      $baru->isi = $request['isi'];
		      $baru->save();
    	  }else {
    	  	// dd($request['isi']);
		      $data->isi = $request['isi'];
		      $data->save();
    	  }
    	return redirect()->back()->with('success', 'Tata Tertib berhasil disimpan');
    }
}
