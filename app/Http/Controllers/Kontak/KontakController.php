<?php

namespace App\Http\Controllers\Kontak;

use App\Http\Controllers\Controller;
use App\Mail\EmailSending;
use App\Models\Content\Kontak;
use Illuminate\Http\Request;
use Mail;

class KontakController extends Controller
{
    public function kontak() {
    	$data = Kontak::first();
    	return view('smart.kontak.kontak', compact('data'));
    }

    public function sendEmail(Request $request) {
        // dd($request->all());
        Mail::to('smkn1jabons@gmail.com')->send(new EmailSending($request));
        return response()->json(true);
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
          dd($data);
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
