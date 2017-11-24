<?php

namespace App\Http\Controllers\Ppdb;

use Illuminate\Http\Request;
use App\Models\Ppdb\Siswa;
use App\Models\Ppdb\RiwayatP;
use App\Models\Ppdb\OrangTua;
use Session;
use App\Http\Controllers\Controller;

class PpdbController extends Controller
{
    public function getRegister() {
      return view('ppdb.index');
    }

    public function postRegister(Request $request) {
      // dd($request->all());
      if ($request) {
        // siswa
        $tinggal_bersama = $request->tinggal_bersama;
        $siswa = $request->siswa;
        // dd($siswa->id);
        $simpan_siswa = Siswa::create([
          "nama" => $siswa['nama'],
          "nama_panggilan" => $siswa['nama_panggilan'],
          "jenis_kelamin" => $siswa['jenis_kelamin'],
          "tempat_lahir" => $siswa['tempat_lahir'],
          "tgl_lahir" => date('Y-m-d', strtotime($siswa['tgl_lahir'])),
          "agama" => $siswa['agama'],
          "anak_ke" => $siswa['anak_ke'],
          "jumlah_saudara" => $siswa['jumlah_saudara'],
          "tinggal_bersama" => $tinggal_bersama,
          "alamat" => $siswa['alamat'],
          "kota" => $siswa['kota'],
          "kecamatan" => $siswa['kecamatan'],
          "kelurahan" => $siswa['kelurahan'],
          "rt" => $siswa['rt'],
          "rw" => $siswa['rw'],
          "kode_pos" => $siswa['kode_pos'],
        ]);
        // dd($simpan_siswa);

        // Riwayat Pedidikan
        $siswa_id = $simpan_siswa->id;
        $riwayat = $request->riwayat;
        $riwayat['siswa_id'] = $siswa_id;
        $simpan_riwayat = RiwayatP::create($riwayat);
        if ($tinggal_bersama == 'orang_tua' || $tinggal_bersama == 'asrama') {
          // orang tua
          $ayah = $request->ayah;
          $ayah['siswa_id'] = $siswa_id;
          $ayah['tgl_lahir'] = date('Y-m-d', strtotime($ayah['tgl_lahir']));
          OrangTua::create($ayah);
          $ibu = $request->ibu;
          $ibu['siswa_id'] = $siswa_id;
          $ibu['tgl_lahir'] = date('Y-m-d', strtotime($ibu['tgl_lahir']));
          OrangTua::create($ibu);
        }else {
          // else wali
          $wali = $request->wali;
          $wali['siswa_id'] = $siswa_id;
          $wali['tgl_lahir'] = date('Y-m-d', strtotime($wali['tgl_lahir']));
          OrangTua::create($wali);
        }
        Session::put('siswa_id', $siswa_id);
        return redirect()->route('downloadRegister');
      }
    }

    public function downloadRegister() {
      return view('ppdb.download');
    }

    public function downloadPdf($id) {
      $data = Siswa::with(['riwayat', 'orangtua'])->where('id', $id)->first()->toArray();
      // dd($data);
      return view('ppdb.pdf', ['data' => $data]);
    }
}
