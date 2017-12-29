@extends('smart.templates.app')
@section('customCss')
<style type="text/css">
.gallery{
padding: 0 0 50% 0px;
height: 100%;
}
[class*='thumbnail-']{
background: #000;
width: 33.33%;
height: auto;
float: left;
padding: 5px 5px 3px 5px;
/*cursor: zoom-in;*/
}
[class*='thumbnail-'] img{
max-width: 100%;
}
[class*='large-']{
background: #000;
width: 90%;
margin: 0 auto;
padding: 30px;
display: none;
}
[class*='large-'] img{
width: 100%;
max-width: 100%;
margin: 0 auto;
}
.prev{
color: #fff;
font-size: 60px;
position: absolute;
top: 45%;
left: 10px;
float: left;
}
.next{
color: #fff;
font-size: 60px;
position: absolute;
top: 45%;
right: 10px;
float: right;
}
.close{
color: #fff;
font-size: 30px;
position: absolute;
top: 5px;
right: 10px;
float: right;
/*cursor: zoom-out;*/
}
[class*='thumbnail-']{
overflow: hidden;
padding: 0;
position: relative;
/*border:1px solid #00f076;*/
/*cursor: zoom-in;*/
}
[class*='thumbnail-']:hover img{
transition: .3s linear;
transition-delay: 300ms;
transform:  rotate(5deg)  scale(1.4);
}
[class*='thumbnail-'] > .caption{
display: none;
position: absolute;
bottom: 80px;
text-align: center;
padding: 15px;
margin: 30px 70px;
width: 70%;
background-color: #00f076;
color: white;
opacity: 0.8;
}
[class*='thumbnail'] > .caption h3 a {
text-decoration: none;
color: white;
}
[class*='thumbnail-']:hover > .caption{
display: block;
}
@media screen and (max-width:480px){
.caption h3{
font-size: 12px;
}
}
div.c-wrapper{
width: 80%; /* for example */
margin: auto;
}
.carousel-inner > .item > img,
.carousel-inner > .item > a > img{
width: 100%; /* use this, or not */
margin: auto;
height: 550px;
}
</style>
@endsection
@section('content')
<section id="feature">
  <div class="container">
    <div class="section-heading">
      <h1 class="title wow fadeInDown" data-wow-delay=".3s">BERITA TERBARU</h1>
    </div>
    <div class="row wow fadeInDown" data-wow-delay=".3s">
      <div id="carousel-homepage-latestnews" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="height: 300px;">
            @foreach($berita as $data => $value)
            <div class="col-sm-3 latestnews-box">
              <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="{{$value['judul']}}">
                @if($value['type_file'] == 'photo')
              <img src="{{URL::to('upload/berita/'.$value['photo'])}}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="{{URL::to('upload/berita/'.$value['photo'])}}" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a>
              @else
              <video width="250" height="250">
                <source src="{{URL::to('upload/berita/'.$value['photo'])}}" type="video/mp4">
                <source src="{{URL::to('upload/berita/'.$value['photo'])}}" type="video/3gp">
                <source src="{{URL::to('upload/berita/'.$value['photo'])}}" type="video/avi">
              </video>
              @endif
            </div>
            <div class="latesnews-content">
              <h3 class="latestnews-title"><a href="{{route('berita.single', [str_slug($value['judul']), $value['id']])}}" title="{{$value['judul']}}">{{$value['judul']}}</a></h3>
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

    <div class="row wow fadeInDown" data-wow-delay=".3s" style="top: 0;">
      <div class="container">
        <div class="section-heading">
          <h1 class="title wow fadeInDown" data-wow-delay=".3s">Pengumuman TERBARU</h1>
        </div>
        @foreach($pengumuman as $data)
        <div class="col-md-4 col-xs-12">
          <div class="panel panel-succes">
            <div class="panel-heading">
              <h3 class="panel-title"><a href="{{route('pengumumanSingle', $data['id'])}}">{{$data['judul']}}</a></h3>
            </div>
            <div class="panel-body">
              {!! substr($data['isi'], 0, 200) !!}{{strlen($data['isi']) > 200 ? '....' : ' '}}
            </div>
          </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </section>
  <div class="gallery">
    <div class="thumbnail-1 wow fadeInLeft">
      <img src="{{URL::to('smart/images/tkr.png')}}" alt="" />
      <div class="caption">
        <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[0]['nama_jurusan']))}}">Teknik Kendaraan Ringan</a></h3>
      </div>
    </div>

    <div class="thumbnail-1 wow fadeInDown">
      <img src="{{URL::to('smart/images/tei.png')}}" alt="" />
      <div class="caption">
        <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[1]['nama_jurusan']))}}">Teknik Elektronika Industri</a></h3>
      </div>
    </div>

    <div class="thumbnail-1 wow fadeInRight">
      <img src="{{URL::to('smart/images/mm.png')}}" alt="" />
      <div class="caption">
        <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[2]['nama_jurusan']))}}">Multi Media</a></h3>
      </div>
    </div>

    <div class="thumbnail-1 wow fadeInLeft">
      <img src="{{URL::to('smart/images/tekstil.png')}}" alt="" />
      <div class="caption">
        <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[3]['nama_jurusan']))}}">Kriya Tekstil</a></h3>
      </div>
    </div>

    <div class="thumbnail-1 wow fadeInDown">
      <img src="{{URL::to('smart/images/kulit.png')}}" alt="" />
      <div class="caption">
        <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[4]['nama_jurusan']))}}">Kriya Kulit</a></h3>
      </div>
    </div>

    <div class="thumbnail-1 wow fadeInRight">
      <img src="{{URL::to('smart/images/busana.png')}}" alt="" />
      <div class="caption">
        <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[5]['nama_jurusan']))}}">Tata Busana</a></h3>
      </div>
    </div>

  </div>
  <div id="carousel-id" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach($slider as $key => $data)
      <li data-target="#carousel-id" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ' '}}"></li>
      @endforeach
    </ol>
    <div class="carousel-inner">
      @foreach($slider as $key => $data)
      <div class="item {{$key == 0 ? 'active' : ' '}}">
        <img src="upload/slider/{{$data['photo']}}">
      </div>
      @endforeach
      <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
  </div>
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
            <img src="{{URL::to('upload/tentang-kami/profil-sekolah/' . $visiMisi['photo'])}}" alt="" class="img-circle" style="border: 1px solid #333;box-shadow: 6px 3px 10px;">
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
              <img src="{{URL::to('upload/prestasi/'. $value['photo'])}}" class="img-responsive"
              style="max-width: 480px;max-height: 360px" alt="this is a title">
              <div class="overlay">
                <div class="buttons" style="margin-left: 70px">
                  <a rel="gallery" class="fancybox" href="{{URL::to('upload/prestasi/'. $value['photo'])}}"><i class="ion-search"></i></a>
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

    {{-- <div id="carousel-id" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach($slider as $key => $data)
        <li data-target="#carousel-id" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ' '}}"></li>
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach($slider as $key => $data)
        <div class="item {{$key == 0 ? 'active' : ' '}}">
          <img src="upload/slider/{{$data['photo']}}">
        </div>
        @endforeach
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    </div> --}}
    {{-- <section id="hero-area" style="background: url('{{ URL::to('upload/setting/'.  $bghome['photo'])  }}') no-repeat 50%;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="block wow fadeInUp" data-wow-delay=".3s">
              <!-- Slider -->
              <section class="cd-intro">
                <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
                &nbsp;
                </h1>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!--/#main-slider-->
    {{-- <div class="gallery">
      <div class="thumbnail-1 wow fadeInLeft">
        <img src="{{URL::to('smart/images/tkr.png')}}" alt="" />
        <div class="caption">
          <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[0]['nama_jurusan']))}}">Teknik Kendaraan Ringan</a></h3>
        </div>
      </div>

      <div class="thumbnail-1 wow fadeInDown">
        <img src="{{URL::to('smart/images/tei.png')}}" alt="" />
        <div class="caption">
          <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[1]['nama_jurusan']))}}">Teknik Elektronika Industri</a></h3>
        </div>
      </div>

      <div class="thumbnail-1 wow fadeInRight">
        <img src="{{URL::to('smart/images/mm.png')}}" alt="" />
        <div class="caption">
          <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[2]['nama_jurusan']))}}">Multi Media</a></h3>
        </div>
      </div>

      <div class="thumbnail-1 wow fadeInLeft">
        <img src="{{URL::to('smart/images/tekstil.png')}}" alt="" />
        <div class="caption">
          <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[3]['nama_jurusan']))}}">Kriya Tekstil</a></h3>
        </div>
      </div>

      <div class="thumbnail-1 wow fadeInDown">
        <img src="{{URL::to('smart/images/kulit.png')}}" alt="" />
        <div class="caption">
          <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[4]['nama_jurusan']))}}">Kriya Kulit</a></h3>
        </div>
      </div>

      <div class="thumbnail-1 wow fadeInRight">
        <img src="{{URL::to('smart/images/busana.png')}}" alt="" />
        <div class="caption">
          <h3 class="wow fadeInUp"><a href="{{route('jurusan', str_slug($jurusan[5]['nama_jurusan']))}}">Tata Busana</a></h3>
        </div>
      </div>

    </div> --}}
    <!--
    ==================================================
    Slider Section Start
    ================================================== -->
    {{-- <section id="about">
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
              <img src="{{URL::to('upload/tentang-kami/profil-sekolah/' . $visiMisi['photo'])}}" alt="" class="img-circle" style="border: 1px solid #333;box-shadow: 6px 3px 10px;">
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
                <img src="{{URL::to('upload/prestasi/'. $value['photo'])}}" class="img-responsive"
                style="max-width: 480px;max-height: 360px" alt="this is a title">
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
      </section> --}}
      <!-- #works -->
      <!--
      ==================================================
      berita
      ================================================== -->
      {{-- <section id="feature">
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
                    <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="{{$value['judul']}}"><img src="{{URL::to('upload/berita/'.$value['photo'])}}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="{{URL::to('upload/berita/'.$value['photo'])}}" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                    <div class="latesnews-content">
                      <h3 class="latestnews-title"><a href="#!" title="{{$value['judul']}}">{{$value['judul']}}</a></h3>
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
                  <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="item active">
                        <div style="width: 50%;margin:0 auto;font-size: 20px;">
                          <p>
                            "Apapun yang dikerjakan oleh seseorang itu, harusnya bisa bermanfaat bagi dirinya sendiri, bermanfaat bagi bangsanya, juga bermanfaat bagi manusia di dunia pada umumnya"
                          </p>
                          <span><small>Ki Hajar Dewantara</small></span>
                        </div>
                      </div>
                      <div class="item">
                        <div style="width: 50%;margin:0 auto;font-size: 20px;">
                          <p>"Gantungkan cita-cita mu setinggi langit! Bermimpilah setinggi langit. Jika engkau jatuh, engkau akan jatuh di antara bintang-bintang."</p>
                          <span><small>Ir. Soekarno</small></span>
                        </div>
                      </div>
                      <div class="item">
                        <div style="width: 50%;margin:0 auto;font-size: 20px;">
                          <p>"Tujuan pendidikan itu untuk mempertajam kecerdasan, memperkukuh kemauan serta memperhalus perasaan."</p>
                          <span><small>Tan Malaka</small></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @endsection
          @section('customJs')
          <script type="text/javascript">
          $(document).ready(function(){
          // $("[class^='thumbnail-']").click(function(){
          //   $("[class^='thumbnail-']").slideToggle("fast");
          //   $(this).next("[class^='large-']").slideToggle();
          // });

          $(".close").click(function(){
          $("[class^='large-']:visible").toggle();
          $("[class^='thumbnail-']").fadeToggle("fast");;
          });

          });
          new WOW().init();
          </script>
          @endsection