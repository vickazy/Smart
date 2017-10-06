<?php

namespace App\Http\Controllers\Kprodi;

use Illuminate\Http\Request;
use App\Models\KProdi\KProdi;
use App\Models\KProdi\KegiatanJurusan;
use App\Models\KProdi\Jurusan;
use Image, File, DB, DataTables;
use App\Http\Controllers\Controller;

class KegiatanController extends Controller
{

  // =========== For Admin =========== //
    // public function Kegiatan() {
    // 	$data = KProdi::get();
    // 	return view('smart.kegiatan.index', compact('data'));
    // }

    public function adminKegiatan() {
      $jurusan = KegiatanJurusan::get()->toArray();
      $jurusan_id = auth()->guard('kprodi')->user()->jurusan_id;
      $kprodi = Kprodi::with('jurusan')->where('jurusan_id', $jurusan_id)->first();

    	return view('admin.kegiatan.index', compact(['jurusan', 'kprodi']));
    }

    public function getDataKegiatan() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = KegiatanJurusan::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('photo', function($photo) {
          	return '<img src="/upload/kegiatan/'. $photo['photo'] .'" class="img-thumbnail" width="100" height="100" />';
          })
          ->editColumn('tgl_kegiatan', function($photo) {
            return date('d-m-Y', strtotime($photo->tgl_kegiatan));
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/kegiatan/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postKegiatan(Request $request) {
      $this->validate($request, [
        'judul' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'tempat'   =>  'required',
        'tgl_kegiatan'   =>  'required',
        'isi'   =>  'required',
      ]);
      // dd($request->all());
      $data = new KegiatanJurusan;
      $data->judul = $request['judul'];
      $data->tgl_kegiatan = $request['tgl_kegiatan'];
      $data->tempat = $request['tempat'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/kegiatan/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function getEditKegiatan($id) {
      $data = KegiatanJurusan::findOrFail($id);
      return view('admin.kegiatan.edit', ['data' => $data]);
    }

    public function postUpdateKegiatan(Request $request, $id) {
      $this->validate($request, [
        'judul' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'tempat'   =>  'required',
        'tgl_kegiatan'   =>  'required',
        'isi'   =>  'required',
      ]);

      $data = KegiatanJurusan::find($id);
      // dd($data);
      $data->judul = $request['judul'];
      $data->tgl_kegiatan = $request['tgl_kegiatan'];
      $data->tempat = $request['tempat'];
      $data->isi = $request['isi'];
     
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/kegiatan/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/kegiatan/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Kegiatan berhasil di update');
    }

    public function getDeleteKegiatan(Request $request) {
      $data = KegiatanJurusan::find($request->id);
      File::delete(public_path('upload/kegiatan/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
    // ===== end ===== //
}
