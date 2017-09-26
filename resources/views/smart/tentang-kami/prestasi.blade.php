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
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/portfolio/item-1.jpg')}}" class="img-responsive" alt="this is a title">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/portfolio/item-1.jpg')}}">Demo</a>
                  <a target="_blank" href="single-portfolio.html">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Juara I Enghlish Debate
                                  </a>
                                  </h4>
              <p>
                STKIP Jombang gudep 01283
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/portfolio/item-2.jpg')}}" class="img-responsive" alt="this is a title">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/portfolio/item-2.jpg')}}">Demo</a>
                  <a target="_blank" href="single-portfolio.html">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Juara II Implementasi budaya baca
                                  </a>
                                  </h4>
              <p>
                Sekertariat Daerah Sidoarjo
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/portfolio/item-3.jpg')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/portfolio/item-3.jpg')}}">Demo</a>
                  <a target="_blank" href="single-portfolio.html">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                    Juara I Carving Tingkat Provinsi
                                  </a>
                                  </h4>
              <p>
                Dinas Pendidikan Kab.Sidoarjo
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/portfolio/item-4.jpg')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/portfolio/item-4.jpg')}}">Demo</a>
                  <a target="_blank" href="single-portfolio.html">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Juara III Lomba PBB
                                  </a>
                                  </h4>
              <p>
                SMAN 1 WARU
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/portfolio/item-5.jpg')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/portfolio/item-5.jpg')}}">Demo</a>
                  <a target="_blank" href="single-portfolio.html">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                  Juara II story teking
                                  </a>
                                  </h4>
              <p>
                STKIP Jombang gudep 01283
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="1200ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/portfolio/item-6.jpg')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/portfolio/item-6.jpg')}}">Demo</a>
                  <a target="_blank" href="single-portfolio.html">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                  Juara I lomba pramuka penegak VIII
                                  </a>
                                  </h4>
              <p>
                STKIP Jombang gudep 01283
              </p>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
  </section>
@endsection