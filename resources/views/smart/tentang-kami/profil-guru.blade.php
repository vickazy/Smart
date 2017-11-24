@extends('smart.templates.app')

@section('content')

<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Profil Guru</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Profil Guru</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

  <section class="container" style="min-height: 950px">
    @foreach($data->chunk(3) as $guru)
    <div class="row" style="margin-top: 50px;margin-bottom: 50px">
      @foreach($guru as $value)
      <div class="col-lg-4 col-md-4 wow fadeInDown" data-wow-duration="1500ms">
        <div style="box-shadow: 2px 2px 5px #aaa; padding: 10px 2px;">
          <div style="text-align:center;" class="img-guru">
            <img src="{{URL::to('upload/tentang-kami/profil-guru/'. $value['photo'])}}" alt="" class="img-circle" width="200px" height="200px">
            <div style="width:100%;margin-top:20px">
              <h3>{{$value['nama']}}</h3>
            </div>
            <div style="margin-top:10px;text-align:center;" class="img-guru">
              <p style="font-size: 14px">{{$value['bidang']}}</p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach

  </section>

@endsection
