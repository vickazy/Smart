<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Models\Ppdb\Siswa;
use App\Models\Ppdb\RiwayatP;
use App\Models\Ppdb\OrangTua;
use Excel;
use DB, Uuid;
use DataTables;
use PDF;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function getSiswa() {
      $id = auth()->guard('kprodi')->user()->jurusan_id;
        $data = Siswa::where('jurusan_id', $id)->get();
      return view('admin.siswa.index', compact('data'));
    }

    public function getDataSiswa(Request $request) {
        // DB::statement(DB::raw('set @rownum=0'));
        $id = auth()->guard('kprodi')->user()->jurusan_id;
        $data = Siswa::where('jurusan_id', $id)->get();

        // $datatables = DataTables::of($data)
        //   ->addColumn('check', '<input type="checkbox" name="selected_users[]" value="">')
        //   ->editColumn('tgl_lahir', function($tgl) {
        //     return date('d-m-Y', strtotime($tgl['tgl_lahir']));
        //   })
        //   ->addColumn('action', function($data) {
        //     return '<a href="/admin/data/siswa/'.$data->id.'/detail" class="btn btn-info"><i class="fa fa-search"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
        //   })
        //   ->addIndexColumn();

        // return $datatables->make(true);

    }

    public function getSiswaDetail($id) {
      $data = Siswa::find($id);
      return view('admin.siswa.detail', ['data' => $data]);
    }

    public function getSiswaDelete(Request $request) {
      if ($request->ajax()) {
        $data = Siswa::find($request->id)->delete();
        return response()->json($data);
      }
    }

    public function getSiswaEdit($id) {
        $data = Siswa::find($id);
      return view('admin.siswa.edit', ['data' => $data, 'id' => $id]);
    }

    public function postSiswaUpdate(Request $request, $id) {
      // dd($request->all());
      $dataSiswa = $request->siswa;

      if ($request) {
        $siswa = Siswa::find($id)->update($dataSiswa);
      }
      return redirect()->route('getSiswaDetail', $id);
    }

    public function ImportSiswa(Request $request) {
        // dd($request->all());
             if ($request->hasFile('import_file')) {
                    $path = $request->file('import_file')->getRealPath();

                    $data = Excel::load($path, function($render) {
                    })->get();
                    // dd($data);
                    if(!empty($data) && $data->count()){
                      foreach ($data as $key => $value) {
                        $insert[] = [
                          'id' => Uuid::generate()->string,
                          'nisn' => $value->nisn,
                          'nama' => $value->nama,
                          'jenis_kelamin' => $value->jenis_kelamin,
                          'tgl_lahir' => $value->tanggal_lahir,
                          'kelas' => $value->kelas,
                          'jurusan_id' => $value->jurusan_id,
                        ];
                      }
                      if(!empty($insert)){
                        Siswa::insert($insert);
                        return redirect()->back()->with('success', 'Data berhasil di import');
                      }
                    }
            }
    }

    public function deleteMultipleSiswa(Request $request) {
      $siswa = Siswa::whereIn('id', $request['select_delete'])->delete();
      return redirect()->back()->with('success', 'Data berhasil dihapus ! ');
    }



    // public function exportExcelSiswa(Request $request, $type) {
    //   return Excel::create('Data Siswa', function ($excel) use ($request){
    //             $excel->sheet('Data Siswa', function ($sheet) use ($request){
    //                 $start = $request->start;
    //                 $end = $request->end;
    //                 $arr = array();
    //                 $siswa = Siswa::get()->toArray();
    //                 // dd($siswa);
    //                 foreach ($siswa as $data) {
    //                     $data_arr = array(
    //                         $data['nisn'],
    //                         $data['nama'],
    //                         $data['jenis_kelamin'],
    //                         $data['tgl_lahir'],
    //                         $data['kelas'],
    //                         $data['jurusan_id'],
    //                     );
    //                     array_push($arr, $data_arr);
    //                 }
    //                 // dd($arr);
    //                 $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
    //                     'NISN',
    //                     'Nama',
    //                     'Jenis Kelamin',
    //                     'Tanggal Lahir',
    //                     'Kelas',
    //                     'Jurusan',
    //                 ));
    //             });
    //         })->export($type);
    // }

    // public function exportPDFSiswa(Request $request) {
    //   $start = $request->start;
    //   $end = $request->end;
    //   $siswa = Siswa::with('riwayat')->whereBetween('created_at', [$start,$end])->get()->toArray();

    //   $pdf = PDF::loadView('admin.siswa.pdf', ['siswa' => $siswa, 'dari' => $start, 'sampai' => $end])->setPaper('a4', 'landscape');
    //     // $pdf = PDF::render();
    //   return $pdf->stream('Data Siswa ' . $start .' sampai '. $end  . '.pdf');
    // }
}
