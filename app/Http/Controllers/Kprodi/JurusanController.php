<?php

namespace App\Http\Controllers\Kprodi;

use App\Http\Controllers\Controller;
use App\Models\Content\Event;
use App\Models\Content\KategoriEvent;
// use App\Models\KProdi\Jurusan;
use App\Models\KProdi\KProdi;
use App\Models\KProdi\KegiatanJurusan;
use App\Models\Ppdb\Siswa;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{

  // =========== For Admin =========== //
    public function jurusan($nama_jurusan) {
      $unslug = preg_replace('#[-]#', ' ',$nama_jurusan);
      // dd($unslug);
    	$data = Jurusan::with('photo')->where('nama_jurusan', $unslug)->get()->toArray();
      // dd($data);
      $kategoriEvent = KategoriEvent::get()->toArray();
      $kegiatan = KegiatanJurusan::where('jurusan_id', $data[0]['id'])->paginate(5);
      // dd($kegiatan);
      $nama = strtoupper($unslug);
    	return view('smart.jurusan.jurusan', compact(['data', 'nama', 'event', 'kategoriEvent', 'kegiatan']));
    }

    public function getSiswaKelas10($jurusan_id) {
        $data = Siswa::where('jurusan_id', $jurusan_id)
                ->where('kelas', 'not like', '%XI%')
                ->where('kelas', 'not like', '%XII%')
                ->orderBy('nama')->get();
        $datatables = DataTables::of($data)
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function getSiswaKelas11($jurusan_id) {
        $data = Siswa::where('jurusan_id', $jurusan_id)
                ->where('kelas', 'like', '%XI%')
                ->where('kelas', 'not like', '%XII%')
                ->orderBy('nama')->get();
        $datatables = DataTables::of($data)
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function getSiswaKelas12($jurusan_id) {
      $kelas = Siswa::select('kelas')->where('jurusan_id', $jurusan_id)
                      ->where('kelas', 'like', '%XII%')
                      ->groupBy('kelas')
                      ->get();
        $data = Siswa::where('jurusan_id', $jurusan_id)
                // ->where('kelas', 'like', '%XII%')
                ->whereIn('kelas', $kelas)
                ->orderBy('nama')->get();
        // $data = DB::table('siswa')
        //           ->where('jurusan_id', $jurusan_id)
        //           ->where('kelas', 'like', '%XII%')
        //           ->distinct()->select('kelas')
        //           ->get();
        $datatables = DataTables::of($data)
          ->addIndexColumn();

        // $resultArray = [];
        // for ($i=0; $i <count($data); $i++) { 
        //   // array_push($resultArray, $data[$i]);
        //   if (condition) {
        //     # code...
        //   }
        // }


        return response()->json($data);
        // return $datatables->make(true);
    }

    public function event($nama_jurusan) {
      $unslug = preg_replace('#[-]#', ' ',$nama_jurusan);
      $nama = strtoupper($unslug);

      $data = Jurusan::where('nama_jurusan', $unslug)->get()->toArray();
      // dd($data);
      $event = Event::where('jurusan_id', $data[0]['id'])->paginate(5);
      return view('smart.jurusan.event', compact(['nama', 'event']));
    }

    public function kegiatan($nama_jurusan) {
      $unslug = preg_replace('#[-]#', ' ',$nama_jurusan);
      $nama = strtoupper($unslug);

      $data = Jurusan::where('nama_jurusan', $unslug)->get()->toArray();
      // dd($data);
      $kegiatan = KegiatanJurusan::where('jurusan_id', $data[0]['id'])->paginate(5);
      return view('smart.jurusan.kegiatan', compact(['nama', 'kegiatan']));
    }

    public function siswa($nama_jurusan) {
      $unslug = preg_replace('#[-]#', ' ',$nama_jurusan);
      $nama = strtoupper($unslug);

      $data = Jurusan::where('nama_jurusan', $unslug)->first();
      // dd($siswa);

      // === kelas 12 === //
      $kelas12 = Siswa::select('kelas')->where('jurusan_id', $data['id'])
                      ->where('kelas', 'like', '%XII%')
                      ->groupBy('kelas')
                      ->get()->toArray();
      $siswa12 = Siswa::whereIn('kelas', $kelas12)->get()->toArray();
      // dd($kelas12, $siswa12);
      // === Kelas 11 === //
      $kelas11 = Siswa::select('kelas')
                ->where('jurusan_id', $data['id'])
                ->where('kelas', 'like', '%XI%')
                ->where('kelas', 'not like', '%XII%')
                ->groupBy('kelas')
                ->get()->toArray();
      $siswa11 = Siswa::whereIn('kelas', $kelas11)->get()->toArray();
      //  === kelas 10 === //
      $kelas10 = Siswa::select('kelas')
                ->where('jurusan_id', $data['id'])
                ->where('kelas', 'not like', '%XI%')
                ->where('kelas', 'not like', '%XII%')
                ->groupBy('kelas')->get()->toArray();

      $siswa10 = Siswa::whereIn('kelas', $kelas10)->get()->toArray();

      // dd($siswa);
      return view('smart.jurusan.siswa', compact([
                'kelas12',
                'kelas11',
                'kelas10',
                'siswa12',
                'siswa11',
                'siswa10',
                'nama', 
                'siswa', 
                // 'data',
              ]));
    }

    // Single
    public function singleEvent($nama_jurusan, $nama_event, $id) {
      $event = Event::find($id);
      return view('smart.jurusan.single-event', compact('event'));
    }

    public function singleKegiatan($nama_jurusan, $nama_kegiatan, $id) {
      $kegiatan = KegiatanJurusan::find($id);
      return view('smart.jurusan.single-kegiatan', compact('kegiatan'));
    }


    public function adminJurusan() {
      $jurusan = Jurusan::get()->toArray();
    	return view('admin.jurusan.index', compact('jurusan'));
    }

    public function getDataJurusan() {
        $data = Jurusan::orderBy('created_at', 'desc')->get();

        $datatables = DataTables::of($data)
          ->editColumn('deskripsi', function($deskripsi) {
          	return substr(strip_tags($deskripsi['deskripsi']), 0, 100);
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/jurusan/'.$data->id.'/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->rawColumns(['photo', 'action'])
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postJurusan(Request $request) {
      $this->validate($request, [
        'nama_jurusan' => 'required',
        'deskripsi' => 'required',
      ]);

      $data = new Jurusan;
      $data->nama_jurusan = strtolower($request['nama_jurusan']);
      $data->deskripsi = $request['deskripsi'];

      $data->save();
      return redirect()->route('admin.jurusan')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function getEditJurusan($id) {
      $data = Jurusan::find($id);
      return view('admin.jurusan.edit', ['data' => $data]);
    }

    public function postUpdateJurusan(Request $request, $id) {
      $this->validate($request, [
        'nama_jurusan' => 'required',
        'deskripsi' => 'required',
      ]);

      $data = Jurusan::find($id);
      // dd($data);
      $data->nama_jurusan = $request['nama_jurusan'];
      $data->deskripsi = $request['deskripsi'];
      
      $data->save();
      return redirect()->back()->with('success', 'Jurusan berhasil di update');
    }

    public function getDeleteJurusan(Request $request) {
      $data = Jurusan::find($request->id);
      $data->delete();

      return response()->json($data);
    }
    // ===== end ===== //
}
