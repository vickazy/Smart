@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h2>Profil Sekolah</h2>
          <ol class="breadcrumb">
            <li>
              <a href="index.php">
                <i class="ion-ios-home"></i>
                Home
              </a>
            </li>
            <li class="active">Profil Sekolah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  </section><!--/#Page header-->
  <!-- Content -->
  <section class="container" style="margin-top: 40px;">
    <div class="row">
      <div class="col-1g-9 col-xs-12 col-md-9 col-lg-offset-2 wow fadeInLeft" data-wow-duration="1500ms">
        <div style="float:left">
          <img src="{{ URL::to('upload/tentang-kami/profil-sekolah/'. $data['photo']) }}" width="200" height="200" class="img-circle" alt="" style="border: 2px solid;display:block;box-shadow: 8px 8px 8px #aaa;">
        </div>
        <div class="" style="margin-left: 255px;">
          <h1 style="margin-bottom: 20px;" class="title">{{$data['nama']}}</h1>
          <blockquote class="blockquote">
            <p class="mb-0">{{$data['quote']}}</p>
          </blockquote>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 wow fadeInRight" data-wow-duration="1500ms" style="margin-top: 70px">
        <div style="background: #00f076; color: white;text-align:right;padding:40px 20px;word-wrap: break-word;">
          <h1 style="margin-bottom: 40px">Visi</h1>
          <p>{!! $data['visi'] !!}</p>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 wow fadeInLeft" data-wow-duration="1500ms" style="margin-top: 50px">
        <div style="background: #00f076; color: white;text-align:left;padding:40px 20px;word-wrap: break-word;" id="misi">
          <h1 style="margin-bottom: 40px">Misi</h1>
          {!!$data['misi']!!}
        </div>
      </div>
    </div>
  </section>
  <div class="container">
  {{-- galeri --}}
  <h1 style="text-align: center;padding-top: 60px;padding-bottom: 30px">Galeri Photo</h1>
  <div class="galeri cf wow fadeInLeft" data-wow-duration="1500px">
    @foreach($photo as $data)
    <div>
      <img src="{{URL::to('upload/tentang-kami/galeri-profile/'. $data['file'])}}" />
    </div>
    @endforeach
  </div>
  <div class="container">
    <h1 style="text-align: center;padding-top: 60px;padding-bottom: 30px">Galeri Video</h1>
    @foreach($video->chunk(2) as $data)
    <div class="row" style="margin-top: 30px">
      @foreach($data as $value)
      <div class="col-xs-12 col-lg-6">
        <video width="100%" controls>
          <source src="{{URL::to('upload/tentang-kami/galeri-profile/'. $value['file'])}}" type="">
        </video>
      </div>
      @endforeach
    </div>
    @endforeach
  </div>
  </div>
  @endsection
  @section('customJs')
  <script type="text/javascript">
  $(function() {
  $(".img-w").each(function() {
  $(this).wrap("<div class='img-c'></div>")
  let imgSrc = $(this).find("img").attr("src");
  $(this).css('background-image', 'url(' + imgSrc + ')');
  })
  
  
  $(".img-c").click(function() {
  let w = $(this).outerWidth()
  let h = $(this).outerHeight()
  let x = $(this).offset().left
  let y = $(this).offset().top
  
  
  $(".active").not($(this)).remove()
  let copy = $(this).clone();
  copy.insertAfter($(this)).height(h).width(w).delay(500).addClass("active")
  $(".active").css('top', y - 8);
  $(".active").css('left', x - 8);
  
  setTimeout(function() {
  copy.addClass("positioned")
  }, 0)
  
  })
  
  
  
  })
  $(document).on("click", ".img-c.active", function() {
  let copy = $(this)
  copy.removeClass("positioned active").addClass("postactive")
  setTimeout(function() {
  copy.remove();
  }, 500)
  })
  </script>
  @endsection