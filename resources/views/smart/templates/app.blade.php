<!DOCTYPE html>
<html class="no-js">
<head>
  <!-- Basic Page Needs
        ================================================== -->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="icon" type="image/png" href="{{URL::to('smart/images/favicon.png')}}">
  <title>Web Profile Smart Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <!-- Mobile Specific Metas
        ================================================== -->
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Template CSS Files
        ================================================== -->
  <!-- Twitter Bootstrs CSS -->
  <link rel="stylesheet" href="{{URL::to('smart/css/bootstrap.min.css')}}">
  <!-- Ionicons Fonts Css -->
  <link rel="stylesheet" href="{{URL::to('smart/css/ionicons.min.css')}}">
  <!-- animate css -->
  <link rel="stylesheet" href="{{URL::to('smart/css/animate.css')}}">
  <!-- Hero area slider css-->
  <link rel="stylesheet" href="{{URL::to('smart/css/slider.css')}}">
  <!-- owl craousel css -->
  <link rel="stylesheet" href="{{URL::to('smart/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{URL::to('smart/css/owl.theme.css')}}">
  <link rel="stylesheet" href="{{URL::to('smart/css/jquery.fancybox.css')}}">
  <!-- template main css file -->
  <link rel="stylesheet" href="{{URL::to('smart/css/main.css')}}">
  <!-- responsive css -->
  <link rel="stylesheet" href="{{URL::to('smart/css/responsive.css')}}">

  <!-- Template Javascript Files
        ================================================== -->
  <!-- modernizr js -->
  <script src="{{URL::to('smart/js/vendor/modernizr-2.6.2.min.js')}}"></script>
  <!-- jquery -->
  <script src="{{URL::to('smart/js/jquery.min.js')}}"></script>
  <!-- owl carouserl js -->
  <script src="{{URL::to('smart/js/owl.carousel.min.js')}}"></script>
  <!-- bootstrap js -->

  <script src="{{URL::to('smart/js/bootstrap.min.js')}}"></script>
  <!-- wow js -->
  <script src="{{URL::to('smart/js/wow.min.js')}}"></script>
  <!-- slider js -->
  <script src="{{URL::to('smart/js/slider.js')}}"></script>
  <script src="{{URL::to('smart/js/jquery.fancybox.js')}}"></script>
  @yield('customJs')
  <!-- template main js -->
  <script src="{{URL::to('smart/js/main.js')}}"></script>
</head>

<body>
  <!--
        ==================================================
        Header Section Start
        ================================================== -->
  <header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="container">
      <div class="navbar-header">
        <!-- responsive nav button -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
        <!-- /responsive nav button -->

        <!-- logo -->
        <div class="navbar-brand">
          <a href="index.html">
                            <img src="{{URL::to('smart/images/logo.png')}}" alt="">
                        </a>
        </div>
        <!-- /logo -->
      </div>
      <!-- main menu -->
      <nav class="collapse navbar-collapse navbar-right" role="navigation">
        <div class="main-menu">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="{{route('home')}}">Home</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tentang Kami<span class="caret"></span></a>
              <div class="dropdown-menu">
                <ul>
                  <li><a href="{{ route('profil-sekolah') }}">Profil Sekolah</a></li>
                  <li><a href="{{ route('profil-guru') }}">Profil Guru</a></li>
                  <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
                  <li><a href="{{ route('sarpras') }}">Sarana & Prasarana</a></li>
                  <li><a href="{{ route('tertib') }}">Tata Tertib</a></li>
                </ul>
              </div>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Program<span class="caret"></span></a>
              <div class="dropdown-menu">
                <ul>
                  <li><a href="{{ route('osis') }}">Osis</a></li>
                  <li><a href="{{ route('extra') }}">Extra Kurikuler</a></li>
                </ul>
              </div>
            </li>
            <li><a href="{{ route('berita') }}">Berita</a></li>
            <li><a href="{{ route('event') }}">Event</a></li>
            <li><a href="{{ route('galeri') }}">Galeri</a></li>
            <li><a href="{{ route('ebook') }}">E-book</a></li>
            <li><a href="{{ route('komite') }}">Komite Sekolah</a></li>
            <li><a href="{{ route('kontak') }}">Kontak</a></li>
            <li><a href="{{ route('getPpdb') }}" target="_blank">Daftar</a></li>
          </ul>
        </div>
      </nav>
      <!-- /main nav -->
    </div>
  </header>

  @yield('content')


  <!--
  ==================================================
  Footer Section Start
  ================================================== -->
  <footer id="footer">
      <div class="container">
          <div class="col-md-8">
              <p class="copyright">Copyright: <span>2017</span> . Design and Developed by <a href="http://www.easytech.co.id">e-Tech Inc</a></p>
          </div>
          <div class="col-md-4">
              <!-- Social Media -->
              <ul class="social">
                  <li>
                      <a href="#" class="Facebook">
                          <i class="ion-social-facebook"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="Twitter">
                          <i class="ion-social-twitter"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="Linkedin">
                          <i class="ion-social-linkedin"></i>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="Google Plus">
                          <i class="ion-social-googleplus"></i>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </footer> <!-- /#footer -->

  </body>
  </html>
