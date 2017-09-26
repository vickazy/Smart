@extends('smart.templates.app')

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Sarana & Prasarana</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Sarana & Prasana</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

<section class="container">
  <div class="row" style="margin-top: 52px">
    @foreach($data as $value)
    <div class="col-xs-12 wow fadeInUp" data-wow-delay=".3s" style="">
      <div class="col-lg-3" style="padding: 20px 10px 20px 40px">
        <img src="{{ URL::to('upload/tentang-kami/sarpras/'. $value['photo']) }}" alt="" class="img-thumbnail" width="200px" height="80px" style="float: left;display: block">
      </div>
      <div class="col-lg-9">
        <h1 class="title">{{$value['nama']}}</h1>
        <p>{{strip_tags($value['isi'])}}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection