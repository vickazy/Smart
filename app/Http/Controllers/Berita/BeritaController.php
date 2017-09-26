<?php
namespace App\Http\Controllers\Berita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image, File;
use App\Models\Content\Berita;
use App\Models\Content\KategoriBerita;
use DataTables;

class BeritaController extends Controller
{
    public function berita() {
      $data = Berita::with('kategoriBerita')->orderBy('created_at', 'desc')->paginate(5);
      $recent = Berita::orderBy('created_at', 'desc')->take(4)->get()->toArray();
      $kategoriBerita = KategoriBerita::get()->toArray();
      // dd($data);
    	return view('smart.berita.berita', ['data' => $data, 'kategoriBerita' => $kategoriBerita, 'recent' => $recent]);
    }

    public function adminBerita() {
      $kategoriBerita = KategoriBerita::get()->toArray();
    	return view('admin.berita.index', ['kategoriBerita' => $kategoriBerita]);
    }

    public function getDataBerita() {
    	DB::statement(DB::raw('set @rownum=0'));
        $data = Berita::with('kategoriBerita')->orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('isi', function($isi) {
          	$data = substr(strip_tags($isi['isi']), 0, 30);
          	return $data;
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/berita/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postBerita(Request $request) {
      $this->validate($request, [
        'judul' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = new Berita;
      $data->judul = $request['judul'];
      $data->kategori_berita_id = $request['kategori_id'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/berita/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function getEditBerita($id) {
      $data = Berita::findOrFail($id);
      $kategoriBerita = KategoriBerita::get()->toArray();
      // dd($data);
      return view('admin.berita.edit', ['kategoriBerita' => $kategoriBerita, 'data' => $data]);
    }

    public function postUpdateBerita(Request $request, $id) {
      $this->validate($request, [
        'judul' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'isi'   =>  'required'
      ]);

      $data = Berita::find($id);
      // dd($data);
      $data->judul = $request['judul'];
      $data->kategori_berita_id = $request['kategori_id'];
      $data->isi = $request['isi'];
      if ($request->hasFile('photo')) {
        // old file
        $oldPhoto = $data->photo;
        File::delete(public_path('upload/berita/'. $oldPhoto));

        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/berita/' . $newName));

        $data->photo = $newName;
      }
      // dd($data);
      $data->save();
      return redirect()->back()->with('success', 'Berita berhasil di update');
    }

    public function getDeleteBerita(Request $request) {
      $data = Berita::find($request->id);
      File::delete(public_path('upload/berita/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }

    public function postKategoriBerita(Request $request) {
      $data = KategoriBerita::create($request->all());
      return response()->json($data);
    }
}
