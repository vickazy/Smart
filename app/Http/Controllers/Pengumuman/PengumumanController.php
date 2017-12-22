<?php

namespace App\Http\Controllers\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    public function pengumuman() {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->paginate(5);
        return view('smart.pengumuman.index', compact('pengumuman'));
    }

    public function pengumumanSingle($id) {
        $pengumuman = Pengumuman::find($id);
        return view('smart.pengumuman.single', compact('pengumuman'));
    }

    public function index() {
    	return view('admin.pengumuman.index');
    }

    public function getDataPengumuman() {
    	$pengumuman = Pengumuman::get()->toArray();
    	$datatables = DataTables::of($pengumuman)
    				->editColumn('judul', function($pengumuman) {
    					return $pengumuman['judul'];
    				})
    				->addColumn('action', function($pengumuman) {
    					return '<a class="btn btn-warning" href="/admin/pengumuman/id='.$pengumuman['id'].'&edit"><i class="fa fa-edit"></i></a>&nbsp;<a class="btn btn-danger delete" href="#!delete" data-id="'.$pengumuman['id'].'"><i class="fa fa-trash"></i></a>';
    				})
    				->addIndexColumn();

    	return $datatables->make(true);
    }

    public function postPengumuman(Request $request) {
    	  $data = new Pengumuman;
	      $data->judul = $request['judul'];
	      $data->isi = $request['pengumuman'];
	      if ($request->hasFile('file')) {
	        $name = $request->file('file');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        $image = Image::make($name);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/pengumuman/' . $newName));

	        $data->file = $newName;
	      }

	      $data->save();
	      return redirect()->route('admin.pengumuman')->with('success', 'Data berhasil ditambahkan');
    }

    public function getPengumumanEdit($id) {
      $data = Pengumuman::findOrFail($id);
      return view('admin.pengumuman.edit', compact('data'));
    }

    public function postPengumumanUpdate(Request $request, $id) {
    	  $data = Pengumuman::find($id);
	      $data->judul = $request['judul'];
	      $data->isi = $request['pengumuman'];
	      if ($request->hasFile('file')) {
	        // old file
	        $oldPhoto = $data->file;
	        File::delete(public_path('upload/pengumuman/'. $oldPhoto));

	        $name = $request->file('file');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        $image = Image::make($name);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/pengumuman/' . $newName));

	        $data->file = $newName;
	      }
	      // dd($data);
	      $data->save();

	      return redirect()->back()->with('success', 'Data berhasil di update');
    }

    public function getPengumumanDelete(Request $request) {
      $data = Pengumuman::find($request->id);
      File::delete(public_path('upload/pengumuman/'.$data['file']));
      $data->delete();

      return response()->json($data);
    }
}
