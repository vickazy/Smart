<?php

namespace App\Http\Controllers\Kprodi;

use Illuminate\Http\Request;
use App\Models\KProdi\Jurusan;
use App\Models\KProdi\PhotoJurusan;
use Image, File, DB, DataTables;
use App\Http\Controllers\Controller;

class PhotoJurusanController extends Controller
{

  // =========== For Admin =========== //
    // public function Kprodi() {
    // 	$data = KProdi::get();
    // 	return view('smart.kprodi.index', compact('data'));
    // }

    public function adminPhotoJurusan() {
      $id = auth()->guard('kprodi')->user()->jurusan_id;
      $photoJurusan = PhotoJurusan::where('jurusan_id', $id)->paginate(8);
      return view('admin.photo-jurusan.index', compact('photoJurusan'));
    }

    public function postPhotoJurusan(Request $request) {
      $this->validate($request, [
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $data = new PhotoJurusan;
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/photo-jurusan/' . $newName));

        $data->photo = $newName;
        $data->jurusan_id = $request['jurusan_id'];

      $data->save();
      return redirect()->route('admin.PhotoJurusan')->with('success', 'Photo berhasil ditambahkan');
    }

    public function getDeletePhotoJurusan(Request $request) {
      $data = PhotoJurusan::find($request->id);
      File::delete(public_path('upload/photo-jurusan/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
