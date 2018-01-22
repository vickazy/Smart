<?php

namespace App\Http\Controllers\Lst;

use App\Http\Controllers\Controller;
use App\Models\Lst\Lst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class LstController extends Controller
{
    public function lst() {
    	$lst = Lst::orderBy('created_at', 'desc')->paginate(5);
    	return view('smart.lst.index', compact('lst'));
    }

    public function lstSingle($id) {
    	$lst = Lst::find($id);
    	return view('smart.lst.single', compact('lst'));
    }

    public function adminLst() {
    	$lst = Lst::orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.lst.index', compact('lst'));
    }

    public function postLst(Request $request) {
    	$this->validate($request, [
    		'judul' => 'required',
    		'file' => 'mimes:jpeg,png,jpg,3gp,mp4,avi,mkv',
    		'isi' => 'required',
    	]);

    	$lst = new Lst;
    	$lst->judul  = $request['judul'];
    	$lst->isi  = $request['isi'];
    	if ($request->hasFile('file')) {
	        $name = $request->file('file');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        // dd($name->getClientOriginalExtension());
	        if ($name->getClientOriginalExtension() == 'mp4' || $name->getClientOriginalExtension() == '3gp' || $name->getClientOriginalExtension() == 'avi' || $name->getClientOriginalExtension() == 'mkv') {
	          $newName = time() . '.' . $name->getClientOriginalExtension();
	            $path = public_path('upload/lst/');
	            $name->move($path, $newName);
	            $lst->type_file = 'video';
	        }else {
	          $image = Image::make($name);
	          $image->encode('jpg', 75);
	          $image->save(public_path('upload/lst/' . $newName));
	          $lst->type_file = 'photo';
	        }
	        $lst->file = $newName;
	      }

	     $lst->save();
	     return redirect()->back()->with('success', 'Data berhasil di tambahkan');
    }

    public function editLst($id) {
    	$lst = Lst::find($id);
    	return view('admin.lst.edit', compact('lst'));
    }

    public function updateLst(Request $request, $id) {
    	$this->validate($request, [
        'judul' => 'required',
        'file' => 'mimes:jpeg,png,jpg,3gp,mp4,avi,mkv',
        'isi'   =>  'required'
      ]);

      $data = Lst::find($id);
      // dd($data);
      $data->judul = $request['judul'];
      $data->isi = $request['isi'];
      if ($request->hasFile('file')) {
        // old file
        $odlFile = $data->file;
        File::delete(public_path('upload/lst/'. $odlFile));
        $name = $request->file('file');
        $newName = time() . '.' . $name->getClientOriginalExtension();

        if ($name->getClientOriginalExtension() == 'mp4' || $name->getClientOriginalExtension() == '3gp' || $name->getClientOriginalExtension() == 'avi' || $name->getClientOriginalExtension() == 'mkv') {
            $path = public_path('upload/lst/');
            $name->move($path, $newName);
            $data->type_file = 'video';
        }else {
          $image = Image::make($name);
          $image->encode('jpg', 75);
          $image->save(public_path('upload/lst/' . $newName));
          $data->type_file = 'photo';
        }
        $data->file = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Data berhasil di update');
    }

    public function deleteLst(Request $request) {
    	$lst = Lst::find($request['id']);
    	File::delete(public_path('upload/lst/'. $request['file']));
    	$lst->delete();
    	return redirect()->back()->with('Success', 'Data berhasil di hapus!');
    }
}
