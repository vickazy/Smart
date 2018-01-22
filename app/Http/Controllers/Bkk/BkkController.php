<?php

namespace App\Http\Controllers\Bkk;

use App\Http\Controllers\Controller;
use App\Models\Bkk\Bkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BkkController extends Controller
{
    public function bkk() {
    	$bkk = Bkk::orderBy('created_at', 'desc')->paginate(5);
    	return view('smart.bkk.index', compact('bkk'));
    }

    public function bkkSingle($id) {
    	$bkk = Bkk::find($id);
    	return view('smart.bkk.single', compact('bkk'));
    }

    public function adminBkk() {
    	$bkk = Bkk::orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.bkk.index', compact('bkk'));
    }

    public function postBkk(Request $request) {
    	$this->validate($request, [
    		'judul' => 'required',
    		'file' => 'mimes:jpeg,png,jpg,3gp,mp4,avi,mkv',
    		'isi' => 'required',
    	]);

    	$bkk = new bkk;
    	$bkk->judul  = $request['judul'];
    	$bkk->isi  = $request['isi'];
    	if ($request->hasFile('file')) {
	        $name = $request->file('file');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        // dd($name->getClientOriginalExtension());
	        if ($name->getClientOriginalExtension() == 'mp4' || $name->getClientOriginalExtension() == '3gp' || $name->getClientOriginalExtension() == 'avi' || $name->getClientOriginalExtension() == 'mkv') {
	          $newName = time() . '.' . $name->getClientOriginalExtension();
	            $path = public_path('upload/bkk/');
	            $name->move($path, $newName);
	            $bkk->type_file = 'video';
	        }else {
	          $image = Image::make($name);
	          $image->encode('jpg', 75);
	          $image->save(public_path('upload/bkk/' . $newName));
	          $bkk->type_file = 'photo';
	        }
	        $bkk->file = $newName;
	      }

	     $bkk->save();
	     return redirect()->back()->with('success', 'Data berhasil di tambahkan');
    }

    public function editBkk($id) {
    	$bkk = Bkk::find($id);
    	return view('admin.bkk.edit', compact('bkk'));
    }

    public function updateBkk(Request $request, $id) {
    	$this->validate($request, [
        'judul' => 'required',
        'file' => 'mimes:jpeg,png,jpg,3gp,mp4,avi,mkv',
        'isi'   =>  'required'
      ]);

      $data = Bkk::find($id);
      // dd($data);
      $data->judul = $request['judul'];
      $data->isi = $request['isi'];
      if ($request->hasFile('file')) {
        // old file
        $odlFile = $data->file;
        File::delete(public_path('upload/bkk/'. $odlFile));
        $name = $request->file('file');
        $newName = time() . '.' . $name->getClientOriginalExtension();

        if ($name->getClientOriginalExtension() == 'mp4' || $name->getClientOriginalExtension() == '3gp' || $name->getClientOriginalExtension() == 'avi' || $name->getClientOriginalExtension() == 'mkv') {
            $path = public_path('upload/bkk/');
            $name->move($path, $newName);
            $data->type_file = 'video';
        }else {
          $image = Image::make($name);
          $image->encode('jpg', 75);
          $image->save(public_path('upload/bkk/' . $newName));
          $data->type_file = 'photo';
        }
        $data->file = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Data berhasil di update');
    }

    public function deleteBkk(Request $request) {
    	$bkk = Bkk::find($request['id']);
    	File::delete(public_path('upload/bkk/'. $request['file']));
    	$bkk->delete();
    	return redirect()->back()->with('Success', 'Data berhasil di hapus!');
    }
}
