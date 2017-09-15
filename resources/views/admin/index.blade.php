@extends('admin.templates.app')
@section('content')
<div class="col-lg-6 box0">
      <div class="box1">
        <span class="fa fa-refresh fa-spin"></span>
        <h3>{{$totalSiswa}}</h3>
      </div>
        <p>Total semua siswa yang terdaftar</p>
</div>
<div class="col-lg-6 box0">
      <div class="box1">
        <span class="fa fa-user-plus"></span>
        <h3>{{$siswaHariIni}}</h3>
      </div>
        <p>Total siswa terdaftar hari ini</p>
</div>
<div class="col-lg-6" style="margin-top:10px">
  <div class="content-panel">
    <div class="page-header" style="margin-top:0;">
      <h4>Chart Data Siswa</h4>
    </div>
    <div class="">
      {!! $chartjs->render() !!}
    </div>
  </div>
</div>
<div class="col-lg-6" style="margin-top:10px">
  <div class="content-panel">
    <div class="page-header" style="margin-top:0">
      <h4>Siswa Terdaftar Hari Ini</h4>
    </div>
    <div class="list">
      <ol class="list-siswa">
        @foreach ($siswa as $value)
          <li>{{$value['nama']}}</li>
        @endforeach
      </ol>
      <a href="{{route('getSiswa')}}" class="lihat btn btn-warning">Lihat Semua</a>
    </div>
  </div>
</div>
@endsection
