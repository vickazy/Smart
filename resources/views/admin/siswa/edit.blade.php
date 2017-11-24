@extends('admin.templates.app')
@section('content')
  <div class="col-lg-12" style="margin-bottom: 70px">
    <h3><i class="fa fa-angle-right"></i> Edit Siswa <a href="{{route('getSiswaDetail', $id)}}" class="btn btn-danger" style=>Kembali</a></h3>
    <div class="content-panel" style="padding:10px 10px;z-index: -1;">
      <form action="{{route('postSiswaUpdate', $id)}}" method="post">
        {{csrf_field()}}
      <table class="table">
        <tr>
          <td><h4><strong>A. Data Siswa</strong></h4></td>
          <td></td>
          <td><span class="pull-right"><button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button></span></td>
        </tr>
        <tr>
          <td width=20%>NISN</td>
          <td>:</td>
          <td>
            <input type="text" name="siswa[nisn]" class="form-control" value="{{ $data['nisn'] }}">
            @if ($errors->has('siswa[nisn]'))
              <span class="help-block"><p class="text-danger">{{ $errors->first('siswa[nisn]') }}</p></span>
            @endif
          </td>
        </tr>
        <tr>
          <td width=20%>Nama</td>
          <td>:</td>
          <td>
            <input type="text" name="siswa[nama]" class="form-control" value="{{ $data['nama'] }}">
            @if ($errors->has('siswa[nama]'))
              <span class="help-block"><p class="text-danger">{{ $errors->first('siswa[nama]') }}</p></span>
            @endif
          </td>
        </tr>
        {{-- <tr>
          <td width=20%>Nama Panggilan</td>
          <td>:</td>
          <td><input type="text" name="siswa[nama_panggilan]" value="{{ $data['nama_panggilan'] }}" class="form-control"></td>
        </tr> --}}
        <tr>
          <td width=20%>Jenis Kelamin</td>
          <td>:</td>
          <td>
            <select class="form-control" name="siswa[jenis_kelamin]">
              <option value="pria" {{ $data['jenis_kelamin'] == 'pria' ? ' selected' : ' ' }}>Pria</option>
              <option value="wanita" {{ $data['jenis_kelamin'] == 'wanita' ? ' selected' : ' ' }}>Wanita</option>
            </select>
          </td>
        </tr>
        <tr>
          <td width=20%>Tgl Lahir</td>
          <td>:</td>
          <td>
            <input type="text" name="siswa[tgl_lahir]" value="{{ date('d/m/Y', strtotime($data['tgl_lahir'])) }}" class="form-control datepicker" style="width: 50%;display:inline-block">
          </td>
        </tr>
         <tr>
          <td width=20%>Kelas</td>
          <td>:</td>
          <td><input type="text" name="siswa[kelas]" id="" value="{{ $data['kelas'] }}" class="form-control"></td>
        </tr>
        <tr>
          <td width=20%>Jurusan</td>
          <td>:</td>
          <td><input type="text" disabled="" name="siswa[jurusan_id]" id="" value="{{ $data['jurusan']['nama_jurusan'] }}" class="form-control"></td>
        </tr>
        {{-- <tr>
          <td width=20%>Agama</td>
          <td>:</td>
          <td>
            <select class="form-control" name="siswa[agama]">
              <option value="Islam" {{ $data['agama'] == 'Islam' ? ' selected' : ' '  }}>Islam</option>
              <option value="Kristen Katholik" {{ $data['agama'] == 'Kristen Katholik' ? ' selected' : ' '  }}>Kristen Katholik</option>
              <option value="Kristen Protestan" {{ $data['agama'] == 'Kristen Protestan' ? ' selected' : ' '  }}>Kristen Protestan</option>
              <option value="Hindu" {{ $data['agama'] == 'Hindu' ? ' selected' : ' '  }}>Hindu</option>
              <option value="Budha" {{ $data['agama'] == 'Budha' ? ' selected' : ' '  }}>Budha</option>
              <option value="Konghucu" {{ $data['agama'] == 'Konghucu' ? ' selected' : ' '  }}>Konghucu</option>
            </select>
          </td>
        </tr>
          <td width=20%>Anak Ke</td>
          <td>:</td>
          <td><input type="text" name="siswa[anak_ke]" value="{{ $data['anak_ke'] }}" class="form-control" style="width: 20%;display:inline-block"> dari <input type="text" name="siswa[jumlah_saudara]" value="{{ $data['jumlah_saudara'] }}" class="form-control" style="width: 20%;display:inline-block"> Bersaudara</td>
        </tr>
        <tr>
          <td width=20%>Tinggal Bersama</td>
          <td>:</td>
          <td>
            <select class="form-control" name="siswa[tinggal_bersama]">
              <option value="orang_tua" {{ $data['tinggal_bersama'] == 'orang_tua' ? ' selected' : ' ' }}>Orang Tua</option>
              <option value="wali" {{ $data['tinggal_bersama'] == 'wali' ? ' selected' : ' ' }}>Wali</option>
              <option value="asrama" {{ $data['tinggal_bersama'] == 'asrama' ? ' selected' : ' ' }}>Asrama</option>
            </select>
          </td>
        </tr>
        <tr>
          <td width=20%>Alamat Lengkap</td>
          <td>:</td>
          <td>
            <div class="row">

            <div class="col-lg-12">
              <input type="text" name="siswa[alamat]" value="{{ $data['alamat'] }}" class="form-control">
            </div>
          </div>
            <div class="row" style="margin-top: 10px">
            <div class="col-lg-4">
              <input type="text" name="siswa[kota]" value="{{$data['kota']}}" class="form-control">
            </div>
            <div class="col-lg-4">
              <input type="text" name="siswa[kecamatan]" value="{{$data['kecamatan']}}" class="form-control">
            </div>
            <div class="col-lg-4">
              <input type="text" name="siswa[kelurahan]" value="{{ $data['kelurahan'] }}" class="form-control">
            </div>
          </div>
          <div class="row" style="margin-top:10px">
          <div class="col-lg-3 col-lg-offset-3">
            <input type="text" name="siswa[rt]" value="{{$data['rt']}}" class="form-control">
          </div>
          <div class="col-lg-3">
            <input type="text" name="siswa[rw]" value="{{$data['rw'] }}" class="form-control">
          </div>
        </div>
          </td>
        </tr>
        <tr>
          <td width=20%>Kode Pos</td>
          <td>:</td>
          <td><input type="text" name="siswa[kode_pos]" value="{{ $data['kode_pos'] }}" class="form-control"></td>
        </tr> --}}

        {{-- Data Riwayat Pendidikan --}}
        {{-- <tr>
          <td><h4><strong>B. Riwayat Pendidikan Siswa</strong></h4></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td width=20%>NISN Siswa</td>
          <td>:</td>
          <td><input type="text" name="riwayat[nisn]" value="{{ $data['riwayat'][0]['nisn'] }}" class="form-control"></td>
        </tr>
        <tr>
          <td width=20%>Asal Sekolah</td>
          <td>:</td>
          <td><input type="text" name="riwayat[asal_sekolah]" value="{{ $data['riwayat'][0]['asal_sekolah'] }}" class="form-control"></td>
        </tr>
        <tr>
          <td width=20%>Alamat Sekolah</td>
          <td>:</td>
          <td><input type="text" name="riwayat[alamat_sekolah]" value="{{ $data['riwayat'][0]['alamat_sekolah'] }}" class="form-control"></td>
        </tr>

        {{-- Data Orang Tua / Wali --}}
       {{--  <tr>
          <td width=40%><h4><strong>B. Data Orang Tua / Wali</strong></h4></td>
          <td></td>
          <td></td>
        </tr>

        @if ($data['tinggal_bersama'] == 'orang_tua' || $data['tinggal_bersama'] == 'asrama')
        <tr>
          <td width=20%>Nama Ayah</td>
          <td>:</td>
          <td>
            <input type="text" name="ayah[nama]" value="{{ $data['orangtua'][0]['nama'] }}" class="form-control">
            <input type="hidden" name="ayah[id]" value="{{$data['orangtua'][0]['id']}}">
          </td>
        </tr>
        <tr>
          <td width=20%>Nama Ibu</td>
          <td>:</td>
          <td>
            <input type="text" name="ibu[nama]" value="{{ $data['orangtua'][1]['nama'] }}" class="form-control">
            <input type="hidden" name="ibu[id]" value="{{$data['orangtua'][1]['id']}}">
          </td>
        </tr>
        <tr>
          <td width=20%>Pekerjaan Ayah/Ibu</td>
          <td>:</td>
          <td>
            <input type="text" name="ayah[pekerjaan]" value="{{$data['orangtua'][0]['pekerjaan']}}" class="form-control" style="width:40%;display:inline-block">
            <input type="text" name="ibu[pekerjaan]" value="{{$data['orangtua'][1]['pekerjaan']}}" class="form-control" style="width:50%;display:inline-block">
          </td>
        </tr>
        <tr>
          <td width=20%>Penghasilan Ayah/Ibu per bulan</td>
          <td>:</td>
          <td>
            <input type="text" name="ayah[penghasilan]" value="{{$data['orangtua'][0]['penghasilan']}}" class="form-control" style="width:40%;display:inline-block">
            <input type="text" name="ibu[penghasilan]" value="{{$data['orangtua'][1]['penghasilan']}}" class="form-control" style="width:50%;display:inline-block">
          </td>
        </tr>
        <tr>
          <td width=20%>Pendidikan terakhir Ayah/Ibu</td>
          <td>:</td>
          <td>
            <input type="text" name="ayah[pendidikan_terakhir]" value="{{$data['orangtua'][0]['pendidikan_terakhir']}}" class="form-control" style="width:40%;display:inline-block">
            <input type="text" name="ibu[pendidikan_terakhir]" value="{{$data['orangtua'][1]['pendidikan_terakhir']}}" class="form-control" style="width:50%;display:inline-block">
          </td>
        </tr>
      @else
        <tr>
          <td width=20%>Nama Wali</td>
          <td>:</td>
          <td>
            <input type="text" name="wali[nama]" value="{{ $data['orangtua'][0]['nama'] }}" class="form-control">
            <input type="hidden" name="wali[id]" value="{{$data['orangtua'][0]['id']}}">
          </td>
        </tr>
        <tr>
          <td width=20%>Pekerjaan Wali</td>
          <td>:</td>
          <td><input type="text" name="wali[pekerjaan]" value="{{ $data['orangtua'][0]['pekerjaan']}}" class="form-control"></td>
        </tr>
        <tr>
          <td width=20%>Penghasilan Wali per bulan</td>
          <td>:</td>
          <td><input type="text" name="wali[penghasilan]" value="{{ $data['orangtua'][0]['penghasilan'] }}" class="form-control"></td>
        </tr>
        <tr>
          <td width=20%>Pendidikan terakhir Wali</td>
          <td>:</td>
          <td><input type="text" name="wali[pendidikan_terakhir]" value="{{ $data['orangtua'][0]['pendidikan_terakhir']}}" class="form-control"></td>
        </tr>
      @endif --}}
    </form>
    </table>
    </div>
  </div>
@endsection
