<?php

namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SarprasController extends Controller
{
    public function sarpras() {
    	return view('smart.tentang-kami.sarpras');
    }

    public function adminSarpras() {
    	return view('admin.sarpras.index');
    }

    public function getDataSarpras() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Guru::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('photo', function($photo) {
          	return '<img src="/upload/tentang-kami/profil-guru/'. $photo['photo'] .'" class="img-circle" width="80" height="80" />';
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/profil-guru/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postSarpras(Request $request) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'bidang'   =>  'required'
      ]);

      $data = new Guru;
      $data->nama = $request['nama'];
      $data->bidang = $request['bidang'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/tentang-kami/profil-guru/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.sarpras')->with('success', 'Berita berhasil ditambahkan');
    }

    public function getEditSarpras($id) {
      $data = Guru::findOrFail($id);
      return view('admin.profil-guru.edit', ['data' => $data]);
    }

    public function postUpdateSarpras(Request $request, $id) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'bidang'   =>  'required'
      ]);

      $data = Guru::find($id);
      // dd($data);
      $data->nama = $request['nama'];
      $data->bidang = $request['bidang'];
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/tentang-kami/profil-guru/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/tentang-kami/profil-guru/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Berita berhasil di update');
    }

    public function getDeleteSarpras(Request $request) {
      $data = Guru::find($request->id);
      File::delete(public_path('upload/tentang-kami/profil-guru/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
