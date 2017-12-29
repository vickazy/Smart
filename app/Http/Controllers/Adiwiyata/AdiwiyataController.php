<?php

namespace App\Http\Controllers\Adiwiyata;

use App\Http\Controllers\Controller;
use App\Models\Adiwiyata\Adiwiyata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdiwiyataController extends Controller
{
    public function adiwiyata() {
    	$adiwiyata = Adiwiyata::orderBy('created_at', 'desc')->paginate(5);
    	return view('smart.adiwiyata.index', compact('adiwiyata'));
    }

    public function adiwiyataSingle($id) {
    	$adiwiyata = Adiwiyata::find($id);
    	return view('smart.adiwiyata.single', compact('adiwiyata'));
    }

    public function adminAdiwiyata() {
    	$adiwiyata = Adiwiyata::orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.adiwiyata.index', compact('adiwiyata'));
    }

    public function postAdiwiyata(Request $request) {
    	$this->validate($request, [
    		'judul' => 'required',
    		'file' => 'mimes:jpeg,png,jpg,3gp,mp4,avi,mkv',
    		'isi' => 'required',
    	]);

    	$adiwiyata = new Adiwiyata;
    	$adiwiyata->judul  = $request['judul'];
    	$adiwiyata->isi  = $request['isi'];
    	if ($request->hasFile('file')) {
	        $name = $request->file('file');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        // dd($name->getClientOriginalExtension());
	        if ($name->getClientOriginalExtension() == 'mp4' || $name->getClientOriginalExtension() == '3gp' || $name->getClientOriginalExtension() == 'avi' || $name->getClientOriginalExtension() == 'mkv') {
	          $newName = time() . '.' . $name->getClientOriginalExtension();
	            $path = public_path('upload/adiwiyata/');
	            $name->move($path, $newName);
	            $adiwiyata->type_file = 'video';
	        }else {
	          $image = Image::make($name);
	          $image->encode('jpg', 75);
	          $image->save(public_path('upload/adiwiyata/' . $newName));
	          $adiwiyata->type_file = 'photo';
	        }
	        $adiwiyata->file = $newName;
	      }

	     $adiwiyata->save();
	     return redirect()->back()->with('success', 'Data berhasil di tambahkan');
    }

    public function editAdiwiyata($id) {
    	$adiwiyata = Adiwiyata::find($id);
    	return view('admin.adiwiyata.edit', compact('adiwiyata'));
    }

    public function updateAdiwiyata(Request $request, $id) {
    	$this->validate($request, [
        'judul' => 'required',
        'file' => 'mimes:jpeg,png,jpg,3gp,mp4,avi,mkv',
        'isi'   =>  'required'
      ]);

      $data = Adiwiyata::find($id);
      // dd($data);
      $data->judul = $request['judul'];
      $data->isi = $request['isi'];
      if ($request->hasFile('file')) {
        // old file
        $odlFile = $data->file;
        File::delete(public_path('upload/adiwiyata/'. $odlFile));
        $name = $request->file('file');
        $newName = time() . '.' . $name->getClientOriginalExtension();

        if ($name->getClientOriginalExtension() == 'mp4' || $name->getClientOriginalExtension() == '3gp' || $name->getClientOriginalExtension() == 'avi' || $name->getClientOriginalExtension() == 'mkv') {
            $path = public_path('upload/adiwiyata/');
            $name->move($path, $newName);
            $data->type_file = 'video';
        }else {
          $image = Image::make($name);
          $image->encode('jpg', 75);
          $image->save(public_path('upload/adiwiyata/' . $newName));
          $data->type_file = 'photo';
        }
        $data->file = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Data berhasil di update');
    }

    public function deleteAdiwiyata(Request $request) {
    	$adiwiyata = Adiwiyata::find($request['id']);
    	File::delete(public_path('upload/adiwiyata/'. $request['file']));
    	$adiwiyata->delete();
    	return redirect()->back()->with('Success', 'Data berhasil di hapus!');
    }
}
