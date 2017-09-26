<?php

namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use App\Models\Content\VisiMisi;
use Image, File;
use App\Http\Controllers\Controller;

class ProfilSekolahController extends Controller
{
    public function profilSekolah() {
    	$data = VisiMisi::first();
    	return view("smart.tentang-kami.profil-sekolah", compact('data'));
    }

    public function adminProfilSekolah() {
    	$data = VisiMisi::first();
    	return view('admin.profil-sekolah.index', compact('data'));
    }

    public function postProfilSekolah(Request $request) {
    	// dd($request->all());
    	  $data = VisiMisi::find($request->id);
    	  if ($data == null) {
    	  	  $baru = new VisiMisi;
    	  	  $baru->nama = $request['nama'];
		      $baru->quote = $request['quote'];
		      $baru->visi = $request['visi'];
		      $baru->misi = $request['misi'];
		      if ($request->hasFile('photo')) {
		        $name = $request->file('photo');
		        $newName = time() . '.' . $name->getClientOriginalExtension();
		        $image = Image::make($name);
		        $image->encode('jpg', 75);
		        $image->save(public_path('upload/tentang-kami/profil-sekolah/' . $newName));

		        $baru->photo = $newName;
		      }
		      $baru->save();
    	  }else {
    	  	  $data->nama = $request['nama'];
		      $data->quote = $request['quote'];
		      $data->visi = $request['visi'];
		      $data->misi = $request['misi'];
		      if ($request->hasFile('photo')) {
		      	$oldFile = $data->photo;
		      	File::delete(public_path('upload/tentang-kami/'. $oldFile));

		        $name = $request->file('photo');
		        $newName = time() . '.' . $name->getClientOriginalExtension();
		        $image = Image::make($name);
		        $image->encode('jpg', 75);
		        $image->save(public_path('upload/tentang-kami/profil-sekolah/' . $newName));

		        $data->photo = $newName;
		      }

	     		 $data->save();
    	  }
    	return redirect()->back()->with('success', 'Profil berhasil disimpan');
    }
}
