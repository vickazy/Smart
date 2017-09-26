<?php

namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use Image, File, DB, DataTables;
use App\Models\Content\Sarpras;
use App\Http\Controllers\Controller;

class SarprasController extends Controller
{
    public function sarpras() {
    	$data = Sarpras::get()->toArray();
    	return view('smart.tentang-kami.sarpras', compact('data'));
    }

    public function adminSarpras() {
    	return view('admin.sarpras.index');
    }

    public function getDataSarpras() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Sarpras::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('isi', function($isi) {
          	return substr(strip_tags($isi['isi']), 0, 40);
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/sarpras/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postSarpras(Request $request) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = new Sarpras;
      $data->nama = $request['nama'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/tentang-kami/sarpras/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.sarpras')->with('success', 'Berita berhasil ditambahkan');
    }

    public function getEditSarpras($id) {
      $data = Sarpras::findOrFail($id);
      return view('admin.sarpras.edit', ['data' => $data]);
    }

    public function postUpdateSarpras(Request $request, $id) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = Sarpras::find($id);
      // dd($data);
      $data->nama = $request['nama'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/tentang-kami/sarpras/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/tentang-kami/sarpras/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Berita berhasil di update');
    }

    public function getDeleteSarpras(Request $request) {
      $data = Sarpras::find($request->id);
      File::delete(public_path('upload/tentang-kami/profil-guru/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
