<?php
namespace App\Http\Controllers\BgHome;

use Illuminate\Http\Request;
use App\Models\Content\BgHome;
use Image, File;
use App\Http\Controllers\Controller;

class BgHomeController extends Controller
{
    public function adminBgHome() {
    	$bghome = BgHome::first();
    	return view('admin.bghome.index', compact('bghome'));
    }

    public function postBgHome(Request $request) {
      $this->validate($request, [
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $data = BgHome::find($request->id);
        if ($data == null) {
            $baru = new BgHome;
          if ($request->hasFile('photo')) {
            $name = $request->file('photo');
            $newName = time() . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 100);
            $image->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path('upload/setting/' . $newName));

            $baru->photo = $newName;
          }
          $baru->save();
        }else {
          if ($request->hasFile('photo')) {
            $oldFile = $data->photo;
            File::delete(public_path('upload/setting/'. $oldFile));

            $name = $request->file('photo');
            $newName = time() . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/setting/' . $newName));

            $data->photo = $newName;
          }

           $data->save();
        }
      return redirect()->route('admin.setting-home')->with('success', 'Photo berhasil ditambahkan');
    }
}
