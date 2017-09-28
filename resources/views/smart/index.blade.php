@extends('smart.templates.app')
@section('content')
<section id="hero-area" style="background: url('{{ URL::to('upload/setting/'.  $bghome['photo'])  }}') no-repeat 50%;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="block wow fadeInUp" data-wow-delay=".3s">
          <!-- Slider -->
          <section class="cd-intro">
            <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
            <span>TEMPLATE WEB PROFILE SEKOLAH SMART</span><br>
            <span class="cd-words-wrapper">
              <b class="is-visible"><a href="http://easytech.co.id/"></a>e-Tech Inc</b>
            </span>
            </h1>
          </section>
          <!-- cd-intro -->
          <!-- /.slider -->
          <h2 class="wow fadeInUp animated" data-wow-delay=".6s">
          Tahun 1946, tepatnya tanggal 13 Maret 1946 dibentuk sekolah pemerintah yang pertama, mula-mula masih menggunakan nama SMT, lalu diubah menjadi SMOA ( Sekolah Menengah Oemoem Atas ) Tahun 1947, dengan adanya agresi Belanda, Sekolah tersebut dibubarkan / dilarang , akan tetapi guru-guru serta pelajarnya tidak menyerah oleh ancaman penjajah Belanda. Pada awal tahun 1950 SMA Kiblik tersebut bergabung kembali tempat belajarnya dan menempati gedung di Jalan Budi Utomo No.7 sampai sekarang.
          </h2>
          <a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green" style="background-color: #4FC3F7" data-wow-delay=".9s" href="#works" data-section="#works">PRESTASI</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/#main-slider-->
<!--
==================================================
Slider Section Start
================================================== -->
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-6" style="word-wrap: break-word;">
        <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms" >
          <h2>
          Visi & Misi
          </h2>
            <p>
              A. Visi<br>
              {!! $visiMisi['visi'] !!}
            </p>
            <p>
              B. Misi<br>
              {!! $visiMisi['misi'] !!}
            </p>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
          <img src="{{URL::to('smart/images/about/about.jpg')}}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /#about -->
<!--
==================================================
Portfolio Section Start
================================================== -->
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
            <img src="{{URL::to('upload/prestasi/'. $value['photo'])}}" class="img-responsive" alt="this is a title">
            <div class="overlay">
              <div class="buttons">
                <a rel="gallery" class="fancybox" href="{{URL::to('upload/prestasi/'. $value['photo'])}}">Demo</a>
                <a href="#!">Details</a>
              </div>
            </div>
          </div>
          <figcaption>
          <h4>
          <a href="#!">
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
  <!-- #works -->
  <!--
  ==================================================
  Portfolio Section Start
  ================================================== -->
  <section id="feature">
    <div class="container">
      <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">BERITA TERBARU</h1>
      </div>
      <div class="row wow fadeInDown" data-wow-delay=".3s">
        <div id="carousel-homepage-latestnews" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="item active" style="height: 613px;">
            @foreach($berita as $data => $value)
              <div class="col-sm-3 latestnews-box">
                <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015"><img src="{{URL::to('upload/berita/'.$value['photo'])}}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="{{URL::to('upload/berita/'.$value['photo'])}}" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                <div class="latesnews-content">
                  <h3 class="latestnews-title"><a href="#!" title="Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015">{{$value['judul']}}</a></h3>
                  <p>{!! substr($value['isi'], 0, 300) !!}{{strlen($value['isi']) > 300 ? '....' : ' '}}<a href="{{route('berita.single', [str_slug($value['judul']), $value['id']])}}"
                      rel="nofollow"><span class="sr-only"></span>[…]</a></p>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
              <!-- .carousel-inner -->
              {{-- <a class="left carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a></div> --}}
            </div>
          </div>
        </section>
        <!-- /#feature -->
        <!--
        ==================================================
        Call To Action Section Start
        ================================================== -->
        <section id="call-to-action">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                  <!--<p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>-->
                  <a href="#!" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        @endsection