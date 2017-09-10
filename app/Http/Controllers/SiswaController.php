<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use Excel;

class SiswaController extends Controller
{
    public function getSiswa() {
      $siswa = Siswa::with('riwayat')->get()->toArray();
      // dd($siswa);
      return view('admin.siswa.index', ['siswa' => $siswa]);
    }

    public function getDataSiswa() {
        $data = Siswa::all();
        return response()->json($data);
    }

    // public function exportExcelSiswa(Request $request, $type) {
    //      Excel::create('Data Siswa ' $request->tanggal, function ($excel) use ($request){
    //             $excel->sheet('Data Siswa ' .  $request->bulan .'-' .$request->tahun, function ($sheet) use ($request){
    //                 $bulan = $request->bulan;
    //                 $tahun = $request->tahun;
    //                 $arr = array();
    //                 $barang = Pasien::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get()->toArray();
    //                 foreach ($barang as $data) {
    //                     $data_arr = array(
    //                         $data['id'],
    //                         $data['nama'],
    //                         $data['jenis_kelamin'],
    //                         $data['tgl_lahir'],
    //                         $data['pekerjaan'],
    //                         $data['telp'],
    //                         $data['alamat'],
    //                     );
    //                     array_push($arr, $data_arr);
    //                 }
    //                 $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
    //                     'ID',
    //                     'Nama Pasien',
    //                     'Jenis Kelamin',
    //                     'Tgl. Lahir',
    //                     'Pekerjaan',
    //                     'No. Telp',
    //                     'Alamat',
    //                 ));
    //             });
    //         })->download($type);
    // }
}
