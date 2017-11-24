<?php

namespace App\Http\Controllers\TentangKami;

use App\Http\Controllers\Controller;
use App\Models\Content\Profile;
use App\Models\Content\VisiMisi;
use Illuminate\Http\Request;
use Image, File;

class ProfilSekolahController extends Controller
{
    public function profilSekolah() {
    	$data = VisiMisi::first();
    	$photo = Profile::where('type', 'photo')->take(8)->get();
    	$video = Profile::where('type', 'video')->take(8)->get();
    	return view("smart.tentang-kami.profil-sekolah", compact(['data', 'photo', 'video']));
    }

    public function adminProfilSekolah() {
    	$data = VisiMisi::first();
    	$galeri = Profile::paginate(8);
    	return view('admin.profil-sekolah.index', compact(['data', 'galeri']));
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
		      	File::delete(public_path('upload/tentang-kami/profil-sekolah/'. $oldFile));

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

    public function galeriProfile(Request $request) {
    	$this->validate($request, [
    		'type' => 'required',
    		'file' => 'required|mimes:jpg,jpeg,gif,png,mp4,3gp,avi',
    	]);

    	if ($request->hasFile('file')) {
    		$data = new Profile;
    		$name = $request->file('file');
		    $newName = time() . '.' . $name->getClientOriginalExtension();
		    if ($request['type'] == 'photo') {
		    	$image = Image::make($name);
			    $image->encode('jpg', 75);
			    $image->save(public_path('upload/tentang-kami/galeri-profile/' . $newName));
		    }else{
		      $newName = $name->getClientOriginalName();
		      $path = public_path('upload/tentang-kami/galeri-profile/');
		      $name->move($path, $newName);
		    }
		    $data->type = $request['type'];
		    $data->file = $newName;
		    $data->save();

		    return redirect()->back()->with('success', 'Upload berhasil');
    	}
    }

    public function deleteFile(Request $request) {
    	$data = Profile::find($request->id);
      	File::delete(public_path('upload/tentang-kami/galeri-profile/'.$data['file']));
      	$data->delete();

      	return redirect()->back()->with('success', 'File Berhasil di hapus');
    }
}
