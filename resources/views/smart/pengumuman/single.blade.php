@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{$pengumuman['judul']}}</h2>
                    <div class="portfolio-meta">
                        <span>{{date('F d, Y', strtotime($pengumuman['created_at']))}}</span>|
                        <span>{{$pengumuman['title']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="post-img">
                        @if($pengumuman['file'])
                        <img class="img-responsive" alt="" src="{{URL::to('upload/pengumuman/'.$pengumuman['file'])}}">
                        @endif
                    </div>
                    <div class="post-content">
                        {!! $pengumuman['isi'] !!}
                        </div>
                    </div>
                </div>
            </section>
            @endsection