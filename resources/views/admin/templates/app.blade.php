<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
    @if(Auth::guard('admin')->check())
    Admin
    @elseif(Auth::guard('kprodi')->check())
    Ketua Prodi
    @elseif(Auth::guard('guru')->check())
    Guru
    @endif
    Dashboard
    </title>
    <link rel="icon" type="image/png" href="{{URL::to('smart/logoku.png')}}">
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
      {{-- wysiwyg --}}
      <link rel="stylesheet" type="text/css" href="{{URL::to('node_modules/froala-editor/css/froala_editor.pkgd.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{URL::to('node_modules/froala-editor/css/froala_style.min.css')}}">
      <!-- Custom styles for this template -->
      <link href="{{URL::to('admin/css/style.css')}}" rel="stylesheet">
      <link href="{{URL::to('admin/css/style-responsive.css')}}" rel="stylesheet">
      {{-- <script src="{{URL::to('assets/js/chart-master/Chart.js')}}"></script> --}}
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style type="text/css">
         #editor {overflow:scroll; max-height:300px}
      </style>
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
          <a href="#!" class="logo"><b>
            @if(Auth::guard('admin')->check())
            Admin
            @elseif(Auth::guard('kprodi')->check())
            Ketua Prodi
            @elseif(Auth::guard('guru')->check())
            Guru
            @elseif(Auth::guard('berita')->check())
            Admin Berita
            @endif
          Dashboard</b></a>
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
              {{-- <li class="mt">
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
              </li> --}}
              @if(Auth::guard('admin')->check())
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-newspaper-o"></i>
                  <span>Berita</span>
                </a>
                <ul class="sub">
                  <li>
                    <a href="{{route('admin.berita')}}">
                      <i class="fa fa-newspaper-o"></i> Berita
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.berita.akun')}}">
                      <i class="fa fa-user"></i> Akun Berita
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-picture-o"></i>
                  <span>Setting Galeri</span>
                </a>
                <ul class="sub">
                  <li>
                    <a href="{{route('admin.galeri')}}">
                      <i class="fa fa-picture-o"></i>
                      <span>Galeri</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.slider')}}">
                      <i class="fa fa-image"></i>
                      <span>Slider Home</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.inventaris')}}">
                  <i class="fa fa-legal"></i>
                  <span>Inventaris</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.komite')}}">
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
                    <a href="{{route('admin.prestasi')}}"><i class="fa fa-trophy"></i> Prestasi</a>
                  </li>
                  <li>
                    <a href="{{route('admin.sarpras')}}"><i class="fa fa-cubes"></i> Sarpras</a>
                  </li>
                  <li>
                    <a href="{{route('admin.tataTertib')}}"><i class="fa fa-list"></i> Tata Tertib</a>
                  </li>
                  <li>
                    <a href="{{route('admin.adiwiyata')}}">
                      <i class="fa fa-rocket"></i>
                      Adiwiyata
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.lst')}}">
                      <i class="fa fa-rocket"></i>
                      Lst
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.Bkk')}}">
                      <i class="fa fa-briefcase"></i>
                      BKK
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.kprodi')}}">
                  <i class="fa fa-graduation-cap"></i>
                  <span>Ketua Prodi</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-list"></i>
                  <span>Jurusan & Ekstra Kulikuler</span>
                </a>

                <ul class="sub">
                  <li>
                    <a href="{{route('admin.ekstra')}}">
                      <i class="fa fa-trophy"></i>
                      <span>Ekstra Kulikuler</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.jurusan')}}">
                      <i class="fa fa-list"></i>
                      <span>Jurusan</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.pengumuman')}}">
                  <i class="fa fa-bullhorn"></i>
                  <span>Pengumuman</span>
                </a>
              </li>

              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-gears"></i>
                  <span>Setting Admin</span>
                </a>
                <ul class="sub">
                  <li>
                    <a href="{{route('getAkun')}}">
                      <i class="fa fa-lock"></i>
                      <span>Akun Admin</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.kontak')}}">
                      <i class="fa fa-address-book"></i>
                      <span>Kontak</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.setting-home')}}">
                      <i class="fa fa-image"></i>
                      <span>Photo Sampul</span>
                    </a>
                  </li>
                </ul>
              </li>
              @elseif(Auth::guard('kprodi')->check())
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-clipboard"></i>
                  <span>Absensi</span>
                </a>
                <ul class="sub">
                  <li>
                    <a href="{{route('absensi.index')}}">
                      <i class="fa fa-clipboard"></i>
                      <span>Absensi Jurusan</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('absensi.history')}}">
                      <i class="fa fa-history"></i>
                      <span>History Absensi</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('absensi.review')}}">
                      <i class="fa fa-clock-o"></i>
                      <span>Review Absensi</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.event')}}">
                  <i class="fa fa-calendar"></i>
                  <span>Event Jurusan</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.kegiatan')}}">
                  <i class="fa fa-calendar"></i>
                  <span>Kegiatan Jurusan</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="{{route('getSiswa')}}">
                  <i class="fa fa-users"></i>
                  <span>Data Siswa</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.PhotoJurusan')}}">
                  <i class="fa fa-picture-o"></i>
                  <span>Gallery Photo Jurusan</span>
                </a>
              </li>
              @elseif(Auth::guard('guru')->check())
              <li class="sub-menu">
                <a href="{{route('admin.ebook')}}">
                  <i class="fa fa-file-pdf-o"></i>
                  <span>E-book</span>
                </a>
              </li>
              @elseif(Auth::guard('berita')->check())
              <li class="sub-menu">
                <a href="{{route('admin.berita')}}">
                  <i class="fa fa-newspaper-o"></i>
                  <span>Berita</span>
                </a>
              </li>
              @elseif(Auth::guard('pengurus')->check())
              <li class="sub-menu">
                <a href="{{route('admin.adiwiyata')}}">
                  <i class="fa fa-rocket"></i>
                  <span>Adiwiyata</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.lst')}}">
                  <i class="fa fa-rocket"></i>
                  <span>LSP1</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="{{route('admin.Bkk')}}">
                  <i class="fa fa-briefcase"></i>
                  <span>BKK</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-picture-o"></i>
                  <span>Setting Galeri</span>
                </a>
                <ul class="sub">
                  <li>
                    <a href="{{route('admin.galeri')}}">
                      <i class="fa fa-picture-o"></i>
                      <span>Galeri</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('admin.slider')}}">
                      <i class="fa fa-image"></i>
                      <span>Slider Home</span>
                    </a>
                  </li>
                </ul>
              </li>
              @endif
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
              <div style="margin-right:10px;text-align: center;padding-left: 150px">
                <img src="{{URL::to('smart/logoku.png')}}" width="30">   <b>SMKN 1 JABON </b></a>
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
      {{-- wysiwyg --}}
      <script src="{{URL::to('node_modules/froala-editor/js/froala_editor.pkgd.min.js')}}"></script>
      {{-- tinymce --}}
      {{-- <script type="text/javascript" src="{{URL::to('node_modules/tinymce/tinymce.min.js')}}"></script> --}}

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
      $('textarea').froalaEditor();
      $('.datepicker').datepicker();
      // tinymce.init({
      // selector: 'textarea',
      // height: 500,
      // menubar: false,
      // fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      // plugins: [
      // 'advlist autolink lists link image charmap print preview anchor textcolor',
      // 'searchreplace visualblocks code fullscreen',
      // 'insertdatetime media table contextmenu paste code help'
      // ],
      // toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | fontsizeselect | image code',
      // content_css: [
      // '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      // '//www.tinymce.com/css/codepen.min.css'],
      // });
      </script>
      @if (Session::has('denied'))
      <script type="text/javascript">
      $(document).ready(function() {
      toastr.error('Access Denied', '{{Session::get('denied')}}', {timeOut: 5000});
      });
      </script>
      @endif
    </body>
  </html>