@extends("smart.templates.app")
@section('content')
<section class="global-page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h2>Prestasi Sekolah</h2>
          <ol class="breadcrumb">
            <li>
              <a href="index.php">
                <i class="ion-ios-home"></i>
                Home
              </a>
            </li>
            <li class="active">Prestasi Sekolah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  </section><!--/#Page header-->
  <section id="works" class="works">
    <div class="container">
      <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">PRESTASI</h1>
        <p class="wow fadeInDown" data-wow-delay=".5s">
          Beberapa Prestasi Yang di Raih Di Sekolah Kami
        </p>
      </div>
      @foreach($prestasi->chunk(3) as $data)
      <div class="row">
        @foreach($data as $value)
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
            <div class="img-wrapper">
              <img src="{{URL::to('upload/prestasi/'.$value['photo'])}}" class="img-responsive" style="max-width: 480px;max-height: 360px" alt="this is a title">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox img-responsive" href="{{URL::to('upload/prestasi/'.$value['photo'])}}">Demo</a>
                </div>
              </div>
            </div>
            <figcaption>
            <h4>
            <a href="#">
              {{$value['judul']}}
            </a>
            </h4>
            <p>
              {{$value['isi']}}
            </p>
            </figcaption>
          </figure>
        </div>
        @endforeach
      </div>
      @endforeach
    </section>
    @endsection