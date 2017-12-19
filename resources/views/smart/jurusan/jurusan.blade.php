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
                        <li><a href="{{route('absensi', strtolower(str_slug($nama)))}}" class="btn btn-default">Absensi</a></li>
                        <li><a href="{{route('event', strtolower(str_slug($nama)))}}" class="btn btn-default">Event</a></li>
                        <li><a href="{{route('kegiatan', strtolower(str_slug($nama)))}}" class="btn btn-default">Kegiatan</a></li>
                        <li><a href="{{route('siswa', strtolower(str_slug($nama)))}}" class="btn btn-default">Siswa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <div class="container">
        <div class="media wow fadeInLeft" data-wow-duration="1500px" style="margin-top: 60px">
            <div class="media-body">
                <h3 class="media-heading">Profile Jurusan</h3>
                <p style="text-align: justify;">
                    {!!$data[0]['deskripsi']!!}
                </p>
            </div>
        </div>
        <h1 style="text-align: center;padding-top: 60px;padding-bottom: 30px">Galeri Photo</h1>
        <div class="galeri cf wow fadeInLeft" data-wow-duration="1500px">
            @foreach($data[0]['photo'] as $photo)
            <div>
                <img src="{{URL::to('upload/photo-jurusan/'. $photo['photo'])}}" />
            </div>
            @endforeach
        </div>
    </div>
    @endsection