<?php
namespace App\Http\Controllers\Galeri;

use Illuminate\Http\Request;
use App\Models\Content\Galeri;
use Image, File;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    public function galeri() {
    	$galeri = Galeri::get();
    	return view('smart.galeri.galeri', compact('galeri'));
    }

    public function adminGaleri() {
    	$galeri = Galeri::paginate(8);
    	return view('admin.galeri.index', compact('galeri'));
    }

    public function postGaleri(Request $request) {
      $this->validate($request, [
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $data = new Galeri;
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/galeri/' . $newName));

        $data->photo = $newName;

      $data->save();
      return redirect()->route('admin.galeri')->with('success', 'Photo berhasil ditambahkan');
    }

    public function getDeleteGaleri(Request $request) {
      $data = Galeri::find($request->id);
      File::delete(public_path('upload/galeri/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
