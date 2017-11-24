@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Event Sekolah</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Event Sekolah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <div class="container" style="margin-top: 40px">
        <div class="row">
            <div class="col-lg-4 sidebar" style="margin-top:0px">
                <div class="categories widget">
                    <h3 class="widget-head">Kategori</h3>
                    <ul>
                        @foreach($kategoriEvent as $kategori)
                        <li>
                            <a href="">{{$kategori['nama']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-xs-4">
                <ul class="event-list">
                    @foreach($event as $data)
                    <li class="wow fadeInLeft" data-wow-duration="1500px">
                        <time datetime="2014-07-20">
                        <span class="day">{{date('d', strtotime($data['tgl_event']))}}</span>
                        <span class="month">{{date('M', strtotime($data['tgl_event']))}}</span>
                        </time>
                        <div class="info">
                            <h2 class="title">{{$data['judul']}}</h2>
                            <p class="desc">{{strip_tags($data['isi'])}}</p>
                            <ul>
                                <li style="50%"><i class="glyphicon glyphicon-time"></i> {{date('d-m-Y', strtotime($data['tgl_event']))}}</li>
                                <li style="50%"><i class="glyphicon glyphicon-home"></i> {{$data['tempat']}}</li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
                <span class="pull-right">{{$event->render()}}</span>
        </div>
    </div>
    @endsection