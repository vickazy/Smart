<?php

namespace App\Http\Controllers\Komite;

use Illuminate\Http\Request;
use App\Models\Guru\Komite;
use Image, File, DB, DataTables;
use App\Http\Controllers\Controller;

class KomiteController extends Controller
{
    public function komite() {
    	$komite = Komite::get();
    	return view("smart.komite.komite", compact('komite'));
    }

    public function adminKomite() {
    	return view('admin.komite.index');
    }

    public function getDataKomite() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Komite::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('photo', function($photo) {
          	return '<img src="/upload/komite/'. $photo['photo'] .'" class="img-circle" width="80" height="80" />';
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/komite/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postKomite(Request $request) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'bidang'   =>  'required'
      ]);

      $data = new Komite;
      $data->nama = $request['nama'];
      $data->bidang = $request['bidang'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/komite/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.komite')->with('success', 'Komite berhasil ditambahkan');
    }

    public function getEditKomite($id) {
      $data = Komite::findOrFail($id);
      return view('admin.komite.edit', ['data' => $data]);
    }

    public function postUpdateKomite(Request $request, $id) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'bidang'   =>  'required'
      ]);

      $data = Komite::find($id);
      // dd($data);
      $data->nama = $request['nama'];
      $data->bidang = $request['bidang'];
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/komite/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/komite/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Komite berhasil di update');
    }

    public function getDeleteKomite(Request $request) {
      $data = Komite::find($request->id);
      File::delete(public_path('upload/komite/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
