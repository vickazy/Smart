<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Models\Ppdb\Siswa;
use App\Models\Ppdb\RiwayatP;
use App\Models\Ppdb\OrangTua;
use Excel;
use DB;
use DataTables;
use PDF;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function getSiswa() {
      return view('admin.siswa.index');
    }

    public function getDataSiswa(Request $request) {
        DB::statement(DB::raw('set @rownum=0'));
        $data = Siswa::with('riwayat')->get();

        $datatables = DataTables::of($data)
          ->editColumn('created_at', function($tgl) {
            return $tgl->created_at->format('d/m/Y');
          })
          ->addColumn('action', function($data) {
            return '<a href="/admin/data/siswa/'.$data->id.'/detail" class="btn btn-info"><i class="fa fa-search"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';
          })
          ->addIndexColumn();

        return $datatables->make(true);
    }

    public function getSiswaDetail($id) {
      $data = Siswa::with(['riwayat', 'orangtua'])->find($id);
      return view('admin.siswa.detail', ['data' => $data]);
    }

    public function getSiswaDelete(Request $request) {
      if ($request->ajax()) {
        $data = Siswa::find($request->id)->delete();
        return response()->json($data);
      }
    }

    public function getSiswaEdit($id) {
        $data = Siswa::with(['riwayat', 'orangtua'])->find($id);
      return view('admin.siswa.edit', ['data' => $data, 'id' => $id]);
    }

    public function postSiswaUpdate(Request $request, $id) {
      // dd($request->all());
      $dataSiswa = $request->siswa;
      $tgl_lahir = date('Y-m-d', strtotime($dataSiswa['tgl_lahir']));
      $dataSiswa['tgl_lahir'] = $tgl_lahir;
      // dd($dataSiswa);
      $dataRiwayat = $request->riwayat;

      if ($request) {
        $siswa = Siswa::find($id)->update($dataSiswa);
        $riwayat = RiwayatP::where('siswa_id', $id)->update($dataRiwayat);

        if ($dataSiswa['tinggal_bersama'] == 'orang_tua' || $dataSiswa['tinggal_bersama'] == 'asrama') {
          $ayah = $request->ayah;
          OrangTua::where('id', $ayah['id'])->update($ayah);
          $ibu = $request->ibu;
          OrangTua::where('id', $ibu['id'])->update($ibu);
          // dd($ibu);
        }else{
          $wali = $request->wali;
          OrangTua::where('id', $wali['id'])->update($wali);
        }
      }
      return redirect()->route('getSiswaDetail', $id);
    }

    public function exportExcelSiswa(Request $request, $type) {
      return Excel::create('Data Siswa', function ($excel) use ($request){
                $excel->sheet('Data Siswa', function ($sheet) use ($request){
                    $start = $request->start;
                    $end = $request->end;
                    $arr = array();
                    $siswa = Siswa::with('riwayat')->whereBetween('created_at', [$start,$end])->get()->toArray();
                    // dd($siswa);
                    foreach ($siswa as $data) {
                        $data_arr = array(
                            $data['riwayat'][0]['nisn'],
                            $data['nama'],
                            $data['jenis_kelamin'],
                            $data['tempat_lahir'] . ', '.$data['tgl_lahir'],
                            $data['agama'],
                            $data['anak_ke'],
                            $data['jumlah_saudara'],
                            $data['alamat'] . ' kota/kab. ' .$data['kota'] . ' kec. '.$data['kecamatan'].' kel. '.$data['kelurahan'].' rt. ' . $data['rt']. ' rw. '. $data['rw'].' kode pos: ' .$data['kode_pos'],
                            $data['tinggal_bersama'],
                        );
                        array_push($arr, $data_arr);
                    }
                    // dd($arr);
                    $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
                        'NISN',
                        'Nama Siswa',
                        'Jenis Kelamin',
                        'Tempt/Tgl Lahir',
                        'Agama',
                        'Anak Ke',
                        'Jumlah Saudara',
                        'Alamat Lengkap',
                        'Tinggal Bersama',
                    ));
                });
            })->export($type);
    }

    public function exportPDFSiswa(Request $request) {
      $start = $request->start;
      $end = $request->end;
      $siswa = Siswa::with('riwayat')->whereBetween('created_at', [$start,$end])->get()->toArray();

      $pdf = PDF::loadView('admin.siswa.pdf', ['siswa' => $siswa, 'dari' => $start, 'sampai' => $end])->setPaper('a4', 'landscape');
        // $pdf = PDF::render();
      return $pdf->stream('Data Siswa ' . $start .' sampai '. $end  . '.pdf');
    }
}
