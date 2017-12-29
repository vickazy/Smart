<?php

namespace App\Http\Controllers\Kprodi;

use Illuminate\Http\Request;
use App\Models\KProdi\KProdi;
use App\Models\KProdi\Jurusan;
use Image, File, DB, DataTables;
use App\Http\Controllers\Controller;

class KprodiController extends Controller
{

  // =========== For Admin =========== //
    // public function Kprodi() {
    // 	$data = KProdi::get();
    // 	return view('smart.kprodi.index', compact('data'));
    // }

    public function adminKprodi() {
      $jurusan = Jurusan::get()->toArray();
    	return view('admin.kprodi.index', compact('jurusan'));
    }

    public function getDataKprodi() {
    	// DB::statement(DB::raw('set @rownum=0'));
        $data = KProdi::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('photo', function($photo) {
          	return '<img src="/upload/kprodi/'. $photo['photo'] .'" class="img-circle" width="80" height="80" />';
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/kprodi/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postKprodi(Request $request) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'jurusan_id'   =>  'required',
        'username'   =>  'required',
        'password'   =>  'required',
      ]);

      $data = new Kprodi;
      $data->nama = $request['nama'];
      $data->username = $request['username'];
      $data->password = bcrypt($request['password']);
      $data->jurusan_id = $request['jurusan_id'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/kprodi/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.kprodi')->with('success', 'Ketua Prodi berhasil ditambahkan');
    }

    public function getEditKprodi($id) {
      $data = KProdi::findOrFail($id);
      $jurusan = Jurusan::get()->toArray();
      return view('admin.kprodi.edit', ['data' => $data, 'jurusan' => $jurusan]);
    }

    public function postUpdateKprodi(Request $request, $id) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'username'   =>  'required',
        'jurusan_id'   =>  'required',
      ]);

      $data = KProdi::find($id);
      // dd($data);
      $data->nama = $request['nama'];
      $data->username = $request['username'];
      $data->jurusan_id = $request['jurusan_id'];
      $data->username = $request['username'];
      if ($request['password']) {
        $data->password = bcrypt($request['password']);
      }
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/kprodi/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/kprodi/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Ketua Prodi berhasil di update');
    }

    public function getDeleteKprodi(Request $request) {
      $data = KProdi::find($request->id);
      File::delete(public_path('upload/kprodi/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
    // ===== end ===== //
}
