<?php
namespace App\Http\Controllers\Slider;

use Illuminate\Http\Request;
use App\Models\Content\Slider;
use Image, File;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function adminSlider() {
    	$slider = Slider::paginate(8);
    	return view('admin.slider.index', compact('slider'));
    }

    public function postSlider(Request $request) {
      $this->validate($request, [
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      $data = new Slider;
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/slider/' . $newName));

        $data->photo = $newName;

      $data->save();
      return redirect()->route('admin.slider')->with('success', 'Photo berhasil ditambahkan');
    }

    public function getDeleteSlider(Request $request)
    {
      $data = Slider::find($request->id);
      File::delete(public_path('upload/slider/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
