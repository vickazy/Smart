@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{$bkk['judul']}}</h2>
                    <div class="portfolio-meta">
                        <span>{{date('F d, Y', strtotime($bkk['created_at']))}}</span>|
                        <span>{{$bkk['title']}}</span>
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
                        @if($bkk['type_file'] == 'photo')
                        <a href="#!"><img class="img-responsive" src="{{URL::to("upload/adiwiyata/". $bkk['file'])}}" alt="" /></a>
                        @elseif($bkk['type_file'] == 'video')
                        <video width="100%" controls="">
                            <source src="{{URL::to('upload/adiwiyata/'.$bkk['file'])}}">
                        </video>
                        @else
                        @endif
                    </div>
                    <div class="post-content">
                        {!! $bkk['isi'] !!}
                    </div>
                </div>
            </div>
        </section>
        @endsection