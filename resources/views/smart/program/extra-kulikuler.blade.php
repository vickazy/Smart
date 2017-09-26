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
      <div class="row" style="margin-top:50px">
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/extra/extra-1.png')}}" class="img-responsive" alt="this is a title">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/extra/extra-1.png')}}">Demo</a>
                  <a href="#!">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Karate
                                  </a>
                                  </h4>
              <p>
                Extrakulikuler Karate
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/extra/extra-2.png')}}" class="img-responsive" alt="this is a title">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/extra/extra-2.png')}}">Demo</a>
                  <a href="#!">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Paskibra
                                  </a>
                                  </h4>
              <p>
              Extrakulikuler Paskibra
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/extra/extra-3.png')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/extra/extra-3.png')}}">Demo</a>
                  <a href="#!">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Basket
                                  </a>
                                  </h4>
              <p>
                Extrakulikuler Basket
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/extra/extra-1.png')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/extra/extra-1.png')}}">Demo</a>
                  <a href="#!">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Karate
                                  </a>
                                  </h4>
              <p>
                Extrakulikuler Karate
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/extra/extra-2.png')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/extra/extra-2.png')}}">Demo</a>
                  <a href="#!">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Paskibra
                                  </a>
                                  </h4>
              <p>
                Extrakulikuler Paskibra
              </p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-4 col-xs-12">
          <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="1200ms">
            <div class="img-wrapper">
              <img src="{{URL::to('smart/images/extra/extra-3.png')}}" class="img-responsive" alt="">
              <div class="overlay">
                <div class="buttons">
                  <a rel="gallery" class="fancybox" href="{{URL::to('smart/images/extra/extra-3.png')}}">Demo</a>
                  <a href="#!">Details</a>
                </div>
              </div>
            </div>
            <figcaption>
              <h4>
                                  <a href="#">
                                      Basket
                                  </a>
                                  </h4>
              <p>
                Extrakulikuler Basket
              </p>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
    </section>
@endsection