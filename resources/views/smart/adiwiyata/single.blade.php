@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{$adiwiyata['judul']}}</h2>
                    <div class="portfolio-meta">
                        <span>{{date('F d, Y', strtotime($adiwiyata['created_at']))}}</span>|
                        <span>{{$adiwiyata['title']}}</span>
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
                        @if($adiwiyata['type_file'] == 'photo')
                        <a href="#!"><img class="img-responsive" src="{{URL::to("upload/adiwiyata/". $adiwiyata['file'])}}" alt="" /></a>
                        @elseif($adiwiyata['type_file'] == 'video')
                        <video width="100%" controls="">
                            <source src="{{URL::to('upload/adiwiyata/'.$adiwiyata['file'])}}">
                        </video>
                        @else
                        @endif
                    </div>
                    <div class="post-content">
                        {!! $adiwiyata['isi'] !!}
                    </div>
                </div>
            </div>
        </section>
        @endsection