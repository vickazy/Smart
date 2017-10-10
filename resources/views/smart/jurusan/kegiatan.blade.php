@extends("smart.templates.app")
@section('customCss')
<link rel="stylesheet" href="{{URL::to('admin/css/datatables.bootstrap.min.css')}}">
<style type="text/css">
    .menu li {
        display: inline-block;
        padding: 5px;
    }
</style>
@endsection
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{ $nama }}</h2>
                    <ul class="menu">
                        <li><a href="{{route('event', strtolower(str_slug($nama)))}}" class="btn btn-default" target="_blank">Event</a></li>
                        <li><a href="{{route('kegiatan', strtolower(str_slug($nama)))}}" class="btn btn-default" target="_blank">Kegiatan</a></li>
                        <li><a href="{{route('siswa', strtolower(str_slug($nama)))}}" class="btn btn-default" target="_blank">Siswa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <div class="container">
        <div style="margin-top: 60px">
            <h1 style="text-align: center;margin-bottom: 20px">Kegiatan</h1>
            <div class="col-lg-12 col-xs-12">
                <ul class="event-list">
                    @foreach($kegiatan as $value)
                    <li class="wow fadeInLeft" data-wow-duration="1500px">
                        <time datetime="2014-07-20">
                            <a href="{{URL::to('upload/kegiatan/'.$value['photo'])}}">
                        <img src="{{URL::to('upload/kegiatan/'.$value['photo'])}}" width="150" height="120">
                        </a>
                        </time>
                        <div class="info">
                            <h2 class="title"><a href="{{route('single-kegiatan', [str_slug($nama), str_slug($value['judul']), $value['id']])}}">{{$value['judul']}}</a></h2>
                            <p class="desc">{{substr(strip_tags($value['isi']), 0, 350)}}</p>
                            <ul>
                                <li style="50%"><i class="glyphicon glyphicon-time"></i> {{date('d-m-Y', strtotime($value['tgl_kegiatan']))}}</li>
                                <li style="50%"><i class="glyphicon glyphicon-home"></i> {{$value['tempat']}}</li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <span class="pull-right">{{$kegiatan->render()}}</span>
        </div>
    </div>
    @endsection