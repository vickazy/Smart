<!DOCTYPE html>
<html class="no-js">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="{{URL::to('smart/logoku.png')}}">

    <title>SMKN 1 JABON SIDOARJO</title>
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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="{{URL::to('smart/css/ionicons.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{URL::to('smart/css/animate.css')}}">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="{{URL::to('smart/css/slider.css')}}">
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{URL::to('admin/css/datatables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('smart/css/slider.css')}}">
    <!-- owl craousel css -->
    <link rel="stylesheet" href="{{URL::to('smart/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::to('smart/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{URL::to('smart/css/jquery.fancybox.css')}}">
    <!-- template main css file -->
    <link rel="stylesheet" href="{{URL::to('smart/css/main.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{URL::to('smart/css/responsive.css')}}">
    @yield('customCss')
    <style type="text/css">
    #hero-area:before {
    background: transparent;
    }
    </style>
    <!-- Template Javascript Files
    ================================================== -->
    <!-- modernizr js -->
    <script src="{{URL::to('smart/js/vendor/modernizr-2.6.2.min.js')}}"></script>
    <!-- jquery -->
    <script src="{{URL::to('smart/js/jquery.min.js')}}"></script>
    {{-- DataTables --}}
      <script src="{{URL::to('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
      <script src="{{URL::to('admin/js/datatables.bootstrap.min.js')}}"></script>
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
    <header id="top-bar" class="navbar-fixed-top animated-header" style="background: #00F076">
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
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-left" role="navigation">
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
                    <li><a href="{{ route('komite') }}">Komite Sekolah</a></li>
                    <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
                    <li><a href="{{ route('sarpras') }}">Sarana & Prasarana</a></li>
                    <li><a href="{{ route('tertib') }}">Tata Tertib</a></li>
                    <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                  </ul>
                </div>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jurusan<span class="caret"></span></a>
                <div class="dropdown-menu">
                  <ul>
                    @foreach($jurusan as $data)
                    <li><a href="{{route('jurusan', str_slug($data['nama_jurusan']))}}">{{$data['nama_jurusan']}}</a></li>
                    @endforeach
                    <li><a href="{{route('extra')}}">Ekstra Kulikuler</a></li>
                  </ul>
                </div>
              </li>
              <li><a href="{{ route('berita') }}">Berita</a></li>
              <li><a href="{{ route('galeri') }}">Galeri</a></li>
              <li><a href="{{ route('ebook') }}">E-book</a></li>
              <li><a href="{{ route('kontak') }}">Kontak</a></li>
              {{-- <li><a href="{{ route('getPpdb') }}" target="_blank">Daftar</a></li> --}}
            </ul>
          </div>
        </nav>
        <!-- /main nav -->
        <!-- logo -->
        <a href="{{route('home')}}" style="color: #444;font-weight: bold;display: block;padding:0; width: 20%" class="navbar-brand navbar-right">
          <img src="{{URL::to('smart/header.png')}}" style="width:80%">
        </a>
        <!-- /logo -->
      </div>
    </header>
    @yield('content')
    <!--
    ==================================================
    Footer Section Start
    ================================================== -->
    <footer id="footer">
      <div class="container">
        <div class="col-md-4">
          <p class="copyright">Copyright: <span>2017</span> . Design and Developed by <a href="http://www.easytech.co.id">e-Tech Inc</a></p>
        </div>
        <div class="col-md-4" style="padding:0px 0px 0px 100px;">
          <a href="/" alt="page hit counter" target="_blank" >
          <embed src="http://s10.histats.com/339.swf"  flashvars="jver=1&acsid=3942243&domi=4"  quality="high"  width="112" height="48" name="339.swf"  align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" /></a>
          <img  src="//sstatic1.histats.com/0.gif?3942243&101" alt="free page hit counter" border="0">
        </div>
        <div class="col-md-4">
          <span class="pull-right">
            <img src="{{URL::to('smart/logoku.png')}}" width="50px">
            &nbsp;<strong>SMKN 1 JABON</strong>
          </span>
        </div>
        {{-- <div class="col-md-4">
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
        </div> --}}
      </div>
      </footer> <!-- /#footer -->
    </body>
  </html>