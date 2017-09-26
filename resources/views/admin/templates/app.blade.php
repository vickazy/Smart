<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('node_modules/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::to('node_modules/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('admin/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('admin/lineicons/style.css')}}">
    {{-- Datatables --}}
    {{-- <link rel="stylesheet"--}}
    <link rel="stylesheet" href="{{URL::to('admin/css/datatables.bootstrap.min.css')}}">
    {{-- bootstrap datepicker--}}
    <link rel="stylesheet" href="{{URL::to('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}">
    {{-- Daterangepicker --}}
    <link rel="stylesheet" href="{{URL::to('node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    {{-- jquery confirm --}}
    <link rel="stylesheet" href="{{URL::to('node_modules/jquery-confirm/dist/jquery-confirm.min.css')}}">
    {{-- Select2 --}}
    <link rel="stylesheet" type="text/css" href="{{URL::to('node_modules/select2/dist/css/select2.min.css')}}">
    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="{{URL::to('node_modules/toastr/build/toastr.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{URL::to('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('admin/css/style-responsive.css')}}" rel="stylesheet">

    {{-- <script src="{{URL::to('assets/js/chart-master/Chart.js')}}"></script> --}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#!" class="logo"><b>Admin Dashboard</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{route('getLogout')}}">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li class="mt">
                      <a href="{{route('getAdmin')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-address-card"></i>
                          <span>Data Siswa</span>
                      </a>
                      <ul class="sub">
                          <li>
                            <a  href="{{route('getSiswa')}}"><i class="fa fa-users"></i> Siswa Terdaftar</a>
                          </li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                    <a href="{{route('admin.berita')}}">
                      <i class="fa fa-newspaper-o"></i>
                      <span>Berita</span>
                    </a>
                    {{-- <ul class="sub">
                      <li>
                        <a href="{{route('admin.berita')}}">
                          <i class="fa fa-newspaper-o"></i> Berita
                        </a>
                      </li>
                      <li>
                        <a href="{{route('admin.berita')}}">
                          <i class="fa fa-newspaper-o"></i> Kategori Berita
                        </a>
                      </li>
                    </ul> --}}
                  </li>
                  <li class="sub-menu">
                    <a href="{{route('admin.event')}}">
                      <i class="fa fa-calendar"></i>
                      <span>Event</span>
                    </a>
                  </li>
                  <li class="sub-menu">
                    <a href="#!">
                      <i class="fa fa-picture-o"></i>
                      <span>Galeri</span>
                    </a>
                  </li>
                  <li class="sub-menu">
                    <a href="#!">
                      <i class="fa fa-graduation-cap"></i>
                      <span>Komite Sekolah</span>
                    </a>
                  </li>
                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-certificate"></i>
                      <span>Tentang Kami</span>
                    </a>
                    <ul class="sub">
                      <li>
                        <a  href="{{route('admin.ProfilSekolah')}}"><i class="fa fa-building"></i> Profil Sekolah</a>
                      </li>
                      <li>
                        <a  href="{{route('admin.ProfilGuru')}}"><i class="fa fa-user"></i> Profil Guru</a>
                      </li>
                      <li>
                        <a href="#!"><i class="fa fa-trophy"></i> Prestasi</a>
                      </li>
                      <li>
                        <a href="{{route('admin.sarpras')}}"><i class="fa fa-cubes"></i> Sarpras</a>
                      </li>
                      <li>
                        <a href="#!"><i class="fa fa-list"></i> Tata Tertib</a>
                      </li>
                    </ul>
                  </li>
                  <li class="sub-menu">
                    <a href="#!">
                      <i class="fa fa-podcast"></i>
                      <span>Program</span>
                    </a>
                    <ul class="sub">
                      <li>
                        <a  href="#!"><i class="fa fa-users"></i> Osis</a>
                      </li>
                      <li>
                        <a  href="#!"><i class="fa fa-info"></i> Extra Kulikuler</a>
                      </li>
                    </ul>
                  </li>
                  <li class="sub-menu">
                    <a href="#!">
                      <i class="fa fa-file-pdf-o"></i>
                      <span>E-book</span>
                    </a>
                  </li>
                  <li class="sub-menu">
                    <a href="#!">
                      <i class="fa fa-address-book"></i>
                      <span>Kontak</span>
                    </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  @yield('content')
              </div><!--/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="pull-right" style="margin-right:10px">
              Developed with <i class="fa fa-heart" style="color:red"></i> by <a href="http://easytech.co.id/">EasyTech</a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{URL::to('node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('node_modules/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script src="{{URL::to('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    {{-- DataTables --}}
    <script src="{{URL::to('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::to('admin/js/datatables.bootstrap.min.js')}}"></script>
    {{-- Datepicker --}}
    <script src="{{URL::to('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" charset="utf-8"></script>
    {{-- Daterangepicker --}}
    <script src="{{URL::to('node_modules/bootstrap-daterangepicker/daterangepicker.js')}}" charset="utf-8"></script>
    {{-- jquery confirm --}}
    <script src="{{URL::to('node_modules/jquery-confirm/dist/jquery-confirm.min.js')}}" charset="utf-8"></script>
    {{-- toastr js --}}
    <script src="{{URL::to('node_modules/toastr/toastr.js')}}" charset="utf-8"></script>
    {{-- ChartJs --}}
    <script src="{{URL::to('node_modules/chart.js/dist/Chart.js')}}" charset="utf-8"></script>
    {{-- Select2 --}}
    <script src="{{URL::to('node_modules/select2/dist/js/select2.min.js')}}" charset="utf-8"></script>

    <script class="include" type="text/javascript" src="{{URL::to('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{URL::to('admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{URL::to('admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('admin/js/jquery.sparkline.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{URL::to('admin/js/common-scripts.js')}}"></script>

    <script type="text/javascript" src="{{URL::to('admin/js/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('admin/js/gritter-conf.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('admin/custom.js')}}"></script>
    @yield('customJs')
    <script type="text/javascript">
      $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('.select2').select2();
      });
    </script>
  </body>
</html>
