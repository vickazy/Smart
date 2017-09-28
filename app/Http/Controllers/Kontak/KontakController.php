<?php

namespace App\Http\Controllers\Kontak;

use Illuminate\Http\Request;
use App\Models\Content\Kontak;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function kontak() {
    	$data = Kontak::first();
    	return view('smart.kontak.kontak', compact('data'));
    }

    public function adminKontak() {
    	$data = Kontak::first();
    	return view('admin.kontak.index', ['data' => $data]);
    }

    public function postKontak(Request $request) {
    	  // dd($request->all());
    	  $this->validate($request, [
    	  	'alamat' => 'required',
    	  	'email' => 'required',
    	  	'no_telpon' => 'required',
    	  ]);

    	  $data = Kontak::find($request->id);
    	  if ($data == null) {
    	  	  $baru = new Kontak;
		      $baru->alamat = $request['alamat'];
		      $baru->email = $request['email'];
		      $baru->no_telpon = $request['no_telpon'];
		      $baru->save();
    	  }else {
    	  	  $data->alamat = $request['alamat'];
		      $data->email = $request['email'];
		      $data->no_telpon = $request['no_telpon'];
		      $data->save();
    	  }
    	return redirect()->back()->with('success', 'Kontak berhasil disimpan');
    }
}
