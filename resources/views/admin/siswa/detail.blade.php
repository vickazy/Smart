@extends('admin.templates.app')
@section('content')
  <div class="col-lg-12" style="margin-bottom: 30px">
    <h3><i class="fa fa-angle-right"></i> Detail Siswa <a href="{{route('getSiswa')}}" class="btn btn-danger" style=>Kembali</a></h3>
    <div class="content-panel" style="padding:10px 10px;z-index: -1;">
      <table class="table">
        <tr>
          <td><h4><strong>A. Data Siswa</strong></h4></td>
          <td></td>
          <td><span class="pull-right"><a href="{{route('getSiswaEdit', $data['id'])}}" class="btn btn-warning">Edit <i class="fa fa-edit"></i></a>&nbsp;<a href="{{route('downloadPdf', $data['id'])}}" class="btn btn-info">Print <i class="fa fa-print"></i></a></span></td>
        </tr>
        <tr>
          <td width=20%>Nama</td>
          <td>:</td>
          <td>{{ $data['nama'] }}</td>
        </tr>
        <tr>
          <td width=20%>Nama Panggilan</td>
          <td>:</td>
          <td>{{ $data['nama_panggilan'] }}</td>
        </tr>
        <tr>
          <td width=20%>Jenis Kelamin</td>
          <td>:</td>
          <td>{{ $data['jenis_kelamin'] }}</td>
        </tr>
        <tr>
          <td width=20%>Tempat/Tgl Lahir</td>
          <td>:</td>
          <td>{{ $data['tempat_lahir'] . ',' . $data['tgl_lahir'] }}</td>
        </tr>
        <tr>
          <td width=20%>Agama</td>
          <td>:</td>
          <td>{{ $data['agama'] }}</td>
        </tr>
          <td width=20%>Anak Ke</td>
          <td>:</td>
          <td>{{ $data['anak_ke'] }} dari {{ $data['jumlah_saudara'] }} Bersaudara</td>
        </tr>
        <tr>
          <td width=20%>Tinggal Bersama</td>
          <td>:</td>
          <td>@if ($data['tinggal_bersama'] == 'orang_tua')Orang Tua @elseif ($data['tinggal_bersama'] == 'wali') Wali @else Asrama @endif</td>
        </tr>
        <tr>
          <td width=20%>Alamat Lengkap</td>
          <td>:</td>
          <td>{{ $data['alamat'] }} | RT.{{ $data['rt'] . ' RW.' . $data['rw'] }} | Kel. {{ $data['kelurahan'] }} | Kec. {{$data['kecamatan']}} | Kota/Kab. {{$data['kota']}}</td>
        </tr>
        <tr>
          <td width=20%>Kode Pos</td>
          <td>:</td>
          <td>{{ $data['kode_pos'] }}</td>
        </tr>

        {{-- Data Riwayat Pendidikan --}}
        <tr>
          <td><h4><strong>B. Riwayat Pendidikan Siswa</strong></h4></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td width=20%>NISN Siswa</td>
          <td>:</td>
          <td>{{ $data['riwayat'][0]['nisn'] }}</td>
        </tr>
        <tr>
          <td width=20%>Asal Sekolah</td>
          <td>:</td>
          <td>{{ $data['riwayat'][0]['asal_sekolah'] }}</td>
        </tr>
        <tr>
          <td width=20%>Alamat Sekolah</td>
          <td>:</td>
          <td>{{ $data['riwayat'][0]['alamat_sekolah'] }}</td>
        </tr>

        {{-- Data Orang Tua / Wali --}}
        <tr>
          <td width=40%><h4><strong>B. Data Orang Tua / Wali</strong></h4></td>
          <td></td>
          <td></td>
        </tr>

        @if ($data['tinggal_bersama'] == 'orang_tua' || $data['tinggal_bersama'] == 'asrama')
        <tr>
          <td width=20%>Nama Ayah</td>
          <td>:</td>
          <td>{{ $data['orangtua'][0]['nama'] }}</td>
        </tr>
        <tr>
          <td width=20%>Nama Ibu</td>
          <td>:</td>
          <td>{{ $data['orangtua'][1]['nama'] }}</td>
        </tr>
        <tr>
          <td width=20%>Pekerjaan Ayah/Ibu</td>
          <td>:</td>
          <td>{{ $data['orangtua'][0]['pekerjaan'] . ' & ' . $data['orangtua'][1]['pekerjaan'] }}</td>
        </tr>
        <tr>
          <td width=20%>Penghasilan Ayah/Ibu per bulan</td>
          <td>:</td>
          <td>{{  'Rp. '.number_format($data['orangtua'][0]['penghasilan']) . ' & ' . 'Rp. '.number_format($data['orangtua'][1]['penghasilan']) }}</td>
        </tr>
        <tr>
          <td width=20%>Pendidikan terakhir Ayah/Ibu</td>
          <td>:</td>
          <td>{{ $data['orangtua'][0]['pendidikan_terakhir'] . ' & '. $data['orangtua'][1]['pendidikan_terakhir'] }}</td>
        </tr>
      @else
        <tr>
          <td width=20%>Nama Wali</td>
          <td>:</td>
          <td>{{ $data['orangtua'][0]['nama'] }}</td>
        </tr>
        <tr>
          <td width=20%>Pekerjaan Wali</td>
          <td>:</td>
          <td>{{ $data['orangtua'][0]['pekerjaan']}}</td>
        </tr>
        <tr>
          <td width=20%>Penghasilan Wali per bulan</td>
          <td>:</td>
          <td>{{  'Rp. '.number_format($data['orangtua'][0]['penghasilan'])}}</td>
        </tr>
        <tr>
          <td width=20%>Pendidikan terakhir Wali</td>
          <td>:</td>
          <td>{{ $data['orangtua'][0]['pendidikan_terakhir']}}</td>
        </tr>
      @endif
    </table>
    </div>
  </div>
@endsection
