<?php

namespace App\Http\Controllers;

use App\Models\KProdi\Absensi;
use App\Models\KProdi\Jurusan;
use App\Models\Ppdb\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class AbsensiController extends Controller
{
	public function index() {
        $kprodi_jurusan_id = $this->getJurusanId();
        $jurusan_id = $kprodi_jurusan_id;
		$nama_jurusan = $this->getNamaJurusan();
		$siswa = Siswa::where('jurusan_id', $kprodi_jurusan_id)->orderBy('nama')->get()->toArray();
    	return view('admin.absensi.index', compact(['nama_jurusan', 'siswa', 'jurusan_id']));
    }

    public function getDataAbsensi() {
    	$kprodi_jurusan_id = $this->getJurusanId();
    	// =============
		$absensi = Absensi::where('jurusan_id', $kprodi_jurusan_id)->orderBy('created_at', 'desc')->groupBy('created_at')->get()->toArray();
    	 $datatables = DataTables::of($absensi)
		    ->editColumn('tgl', function($absensi) {
		    	return date('d-F-Y', strtotime($absensi['created_at']));
		    })
		    ->addColumn('action', function($absensi) {
                $tgl = date('Y-m-d', strtotime($absensi['created_at']));
            	return '<a href="/admin/absensi/'.date('d-m-Y', strtotime($absensi['created_at'])).'/detail" class="btn btn-info btn-md">Detail <i class="fa fa-search"></i></a>&nbsp;<a href="#!delete" class="btn btn-danger delete" data-tgl="'.$tgl.'" data-jurusan_id="'.$absensi['jurusan_id'].'"><i class="fa fa-trash"></i></a>';
            })
		    ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postAbsensi(Request $request) {
    	$siswa_id = $request['siswa_id'];
    	$keterangan = $request['keterangan'];
    	$jurusan_id = $this->getJurusanId();
    	// $absensi = [];
    	for ($i=0; $i <count($siswa_id) ; $i++) {
    		$absensi = Absensi::create([
    			'siswa_id' => $siswa_id[$i],
    			'jurusan_id' => $jurusan_id,
    			'keterangan' => $keterangan[$i],
    		]);
    		// array_push($absensi, $siswa_id[$i]);
    	}

    	return response()->json(true);
    }

    public function getAbsensiDetail($tgl) {
    	$nama_jurusan = $this->getNamaJurusan();
    	$kprodi_jurusan_id = $this->getJurusanId();
    	$absensi = Absensi::whereDate('created_at', date('Y-m-d', strtotime($tgl)))->where('jurusan_id', $kprodi_jurusan_id)->get()->toArray();
    	$tgl = $tgl;
    	// dd($absensi);
    	return view('admin.absensi.detail', compact(['absensi', 'nama_jurusan', 'tgl']));
    }

    public function getJurusanId() {
    	$kprodi_jurusan_id = auth()->guard('kprodi')->user()->jurusan_id;
    	return $kprodi_jurusan_id;
    }

    public function getNamaJurusan() {
    	$kprodi_jurusan_id = $this->getJurusanId();
    	$nama_jurusan = Jurusan::find($kprodi_jurusan_id)->nama_jurusan;

    	return $nama_jurusan;
    }

    public function getDataAbsensiDetail($tgl) {
    	$kprodi_jurusan_id = $this->getJurusanId();
    	$absensi = Absensi::with('siswa')->whereDate('created_at', date('Y-m-d', strtotime($tgl)))->where('jurusan_id', $kprodi_jurusan_id)->get()->toArray();

    	$datatables = DataTables::of($absensi)
            ->editColumn('nama', function($absensi) {
                return $absensi['siswa']['nama'];
            })
		    ->editColumn('kelas', function($absensi) {
		    	return $absensi['siswa']['kelas'];
		    })
		    ->editColumn('jenis_kelamin', function($absensi) {
                $jk = $absensi['siswa']['jenis_kelamin'];
                if ($jk == 'pria') {
                    $jk = 'L';
                }else {
                    $jk = 'P';
                }
		    	return $jk;
		    })
            ->editColumn('nisn', function($absensi) {
                return $absensi['siswa']['nisn'];
            })
		    ->addColumn('action', function($absensi) {
            	return '<a href="#modal-edit" data-id="'.$absensi['id'].'" data-nama="'.$absensi['siswa']['nama'].'" data-keterangan="'.$absensi['keterangan'].'" data-toggle="modal" class="btn btn-warning btn-edit"><i class="fa fa-edit"></i></a>&nbsp;<a href="#!delete" class="btn btn-danger btn-delete" data-id="'.$absensi['id'].'"><i class="fa fa-trash"></i></a>';
            })
		    ->addIndexColumn();

        return $datatables->make(true);
    }

    public function postAbsensiUpdate(Request $request) {
        try {
            $absensi = Absensi::find($request['id_absensi']);
            $absensi->keterangan = $request['keterangan'];
            $absensi->save();
            return response()->json(true);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function getDeleteAbsensi(Request $request) {
        $absensi = Absensi::where('jurusan_id', $request['jurusan_id'])->whereDate('created_at', $request['tgl'])->delete();
        return response()->json($absensi);
    }

    public function importAbsensi(Request $request) {
        if ($request->file('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($render) {
                // dd($render->toArray());
                // $data = [];
                        foreach ($render->toArray() as $value) {
                            $siswa = Siswa::where('nisn', $value['nisn'])->first();
                            // array_push($data, $siswa['nisn']);
                            $absensi = new Absensi;
                            $absensi->siswa_id = $siswa['id'];
                            $absensi->jurusan_id = $siswa['jurusan_id'];
                            $absensi->keterangan = $value['keterangan'];
                            $absensi->save();
                        }
                        // dd($data);
                    });
            return redirect()->back()->with('success', 'Import File Berhasil !');
        }
    }

    public function getDeleteAbsensiAll(Request $request) {
        $absensiAll = Absensi::where('jurusan_id', $request['jurusan_id'])->delete();
        return response()->json($absensiAll);
    }

    public function getDeleteAbsensiSiswa(Request $request) {
        $absensiSiswa = Absensi::where('id', $request['id'])->delete();
        return response()->json($request['id']);
    }

    public function history() {
        return view('admin.absensi.history');
    }

    public function getDataHistory() {
        $kprodi_jurusan_id = $this->getJurusanId();
        $absensi = Absensi::with('siswa')->where('jurusan_id', $kprodi_jurusan_id)->groupBy('siswa_id')->get()->toArray();
        $datatables = DataTables::of($absensi)
            ->editColumn('nama', function($absensi) {
                return $absensi['siswa']['nama'];
            })
            ->editColumn('kelas', function($absensi) {
                return $absensi['siswa']['kelas'];
            })
            ->addColumn('action', function($absensi) {
                return '<a class="btn btn-info" href="/admin/absensi/history/id='.$absensi['siswa_id'].'&detail">Detail <i class="fa fa-search"></i></a>';
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    public function getDetailHistoryAbsensi($id) {
        $absensi = Absensi::with('siswa')->where('siswa_id', $id)->get()->toArray();
        // dd($absensi);
        return view('admin.absensi.detailHistory', compact('absensi'));
    }
}
