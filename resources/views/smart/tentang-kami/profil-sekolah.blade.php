@extends('smart.templates.app')

@section('content')
  
  <section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Profil Sekolah</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Profil Sekolah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

    <!-- Content -->
      <section class="container" style="margin-top: 40px; min-height: 950px">
        <div class="row">
          <div class="col-1g-9 col-xs-12 col-md-9 col-lg-offset-2 wow fadeInLeft" data-wow-duration="1500ms">
            <div style="float:left">
              <img src="{{ URL::to('upload/tentang-kami/profil-sekolah/'. $data['photo']) }}" width="200" height="200" class="img-circle" alt="" style="border: 2px solid;display:block;box-shadow: 8px 8px 8px #aaa;">
            </div>
            <div class="" style="margin-left: 255px;">
              <h1 style="margin-bottom: 20px;" class="title">{{$data['nama']}}</h1>
              <blockquote class="blockquote">
                <p class="mb-0">{{$data['quote']}}</p>
              </blockquote>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 wow fadeInRight" data-wow-duration="1500ms" style="margin-top: 70px">
            <div style="background: #4FC3F7; color: white;text-align:right;padding:40px 20px;word-wrap: break-word;">
              <h1 style="margin-bottom: 40px">Visi</h1>
              <p>{!! $data['visi'] !!}</p>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 wow fadeInLeft" data-wow-duration="1500ms" style="margin-top: 50px">
            <div style="background: #4FC3F7; color: white;text-align:left;padding:40px 20px;word-wrap: break-word;" id="misi">
              <h1 style="margin-bottom: 40px">Misi</h1>
              {!!$data['misi']!!}
            </div>
          </div>
      </div>
      </section>

@endsection