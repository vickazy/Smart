<?php
namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use App\Models\Content\Prestasi;
use Image, File, DB, DataTables;
use App\Http\Controllers\Controller;

class PrestasiController extends Controller
{
    public function prestasi() {
    	$prestasi = Prestasi::get();
    	return view('smart.tentang-kami.prestasi', compact('prestasi'));
    }

    public function adminPrestasi() {
    	return view('admin.prestasi.index');
    }

    public function getDataPrestasi() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Prestasi::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('photo', function($photo) {
          	return '<img src="/upload/prestasi/'. $photo['photo'] .'" class="img-circle" width="80" height="80" />';
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/prestasi/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postPrestasi(Request $request) {
      $this->validate($request, [
        'judul' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = new Prestasi;
      $data->judul = $request['judul'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/prestasi/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function getEditPrestasi($id) {
      $data = Prestasi::findOrFail($id);
      return view('admin.prestasi.edit', ['data' => $data]);
    }

    public function postUpdatePrestasi(Request $request, $id) {
      $this->validate($request, [
        'judul' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = Prestasi::find($id);
      // dd($data);
      $data->judul = $request['judul'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/prestasi/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/prestasi/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Prestasi berhasil di update');
    }

    public function getDeletePrestasi(Request $request) {
      $data = Prestasi::find($request->id);
      File::delete(public_path('upload/prestasi/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }
}
