<?php

namespace App\Http\Controllers\TentangKami;

use Illuminate\Http\Request;
use App\Models\Guru\Guru;
use Image, File, DB;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ProfilGuruController extends Controller
{
    public function profilGuru() {
    	$data = Guru::get();
    	return view('smart.tentang-kami.profil-guru', compact('data'));
    }

    public function adminProfilGuru() {
    	return view('admin.profil-guru.index');
    }

    public function getDataProfilGuru() {
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

    public function postProfilGuru(Request $request) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'bidang'   =>  'required',
        'username'   =>  'required',
        'password'   =>  'required',
        'nim' => 'required',
        'jam_mengajar' => 'required',
        'golongan' => 'required',
        'terhitung_mulai_tgl' => 'required',
      ]);

      $data = new Guru;
      $data->nama = $request['nama'];
      $data->bidang = $request['bidang'];
      $data->nim = $request['nim'];
      $data->jam_mengajar = $request['jam_mengajar'];
      $data->golongan = $request['golongan'];
      $data->terhitung_mulai_tgl = date('Y-m-d', strtotime($request['terhitung_mulai_tgl']));
      $data->username = $request['username'];
      $data->password = bcrypt($request['password']);

      if ($request->hasFile('photo')) {
        $name = $request->file('photo');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/tentang-kami/profil-guru/' . $newName));

        $data->photo = $newName;
      }

      $data->save();
      return redirect()->route('admin.ProfilGuru')->with('success', 'Guru berhasil ditambahkan');
    }

    public function getEditProfilGuru($id) {
      $data = Guru::findOrFail($id);
      return view('admin.profil-guru.edit', ['data' => $data]);
    }

    public function postUpdateProfilGuru(Request $request, $id) {
      $this->validate($request, [
        'nama' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'username'   =>  'required',
        'bidang'   =>  'required',
        'nim' => 'required',
        'jam_mengajar' => 'required',
        'golongan' => 'required',
        'terhitung_mulai_tgl' => 'required',
      ]);

      $data = Guru::find($id);
      $data->nama = $request['nama'];
      $data->bidang = $request['bidang'];
      $data->nim = $request['nim'];
      $data->jam_mengajar = $request['jam_mengajar'];
      $data->golongan = $request['golongan'];
      $data->terhitung_mulai_tgl = date('Y-m-d', strtotime($request['terhitung_mulai_tgl']));
      $data->username = $request['username'];
      if ($request['password']) {
        $data->password = bcrypt($request['password']);
      }
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
      return redirect()->back()->with('success', 'Data berhasil di update');
    }

    public function getDeleteProfilGuru(Request $request) {
      $data = Guru::find($request->id);
      File::delete(public_path('upload/tentang-kami/profil-guru/'.$data['photo']));
      $data->delete();

      return response()->json($data);
    }

    public function getDataGuru() {
      $guru = Guru::orderBy('created_at', 'desc')->get()->toArray();
      $datatables = DataTables::of($guru)
        ->editColumn('nama', function($guru) {
          return $guru['nama'];
        })
        ->editColumn('mata_pelajaran', function($guru) {
          return $guru['bidang'];
        })
        ->addColumn('action', function($guru) {
              $tgl = date('d-m-Y', strtotime($guru['terhitung_mulai_tgl']));
              return '<a href="#modal-detail" data-toggle="modal" class="btn btn-info detail" data-nim="'.$guru['nim'].'" data-bidang="'.$guru['bidang'].'" data-nama="'.$guru['nama'].'" data-jam_mengajar="'.$guru['jam_mengajar'].'" data-status_golongan="'.$guru['golongan'].'"  data-img="'.$guru['photo'].'" data-terhitung_mulai_tgl="'.$tgl.'">Detail <i class="fa fa-search"></i></a>';
            })
        ->addIndexColumn();

        return $datatables->make(true);
    }
}
