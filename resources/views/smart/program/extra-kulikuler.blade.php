@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h2>Extra Kurikuler</h2>
          <ol class="breadcrumb">
            <li>
              <a href="index.php">
                <i class="ion-ios-home"></i>
                Home
              </a>
            </li>
            <li class="active">Extra Kurikuler</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  </section><!--/#Page header-->
  <section class="container">
    @foreach($data->chunk(3) as $ekstra)
    <div class="row" style="margin-top:50px">
      @foreach($ekstra as $value)
      <div class="col-sm-4 col-xs-12">
        @if(!empty($value['photo']))
        <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
          <div class="img-wrapper">
            <img src="{{URL::to('upload/program/ekstra/'. $value['photo'])}}" class="img-responsive" style="max-width: 480px;max-height: 360px" alt="this is a title">
            <div class="overlay">
              <div class="buttons" style="margin-left: 60px;">
                <a rel="gallery" class="fancybox" href="{{URL::to('upload/program/ekstra/'. $value['photo'])}}"><i class="fa fa-search"></i></a>
                
              </div>
            </div>
          </div>
          <figcaption>
            @endif
          <h4>
          <a href="#">{{$value['nama']}}</a>
          </h4>
          <p>
            {{strip_tags($value['isi'])}}
          </p>
          </figcaption>
        </figure>
      </div>
      @endforeach
  </div>
  @endforeach
</section>
@endsection