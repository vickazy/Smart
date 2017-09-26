@extends('smart.templates.app')

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Sarana & Prasarana</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Sarana & Prasana</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

<section class="container">
  <div class="row" style="margin-top: 52px">
    <div class="col-xs-12 wow fadeInUp" data-wow-delay=".3s" style="">
      <div class="col-lg-3" style="padding: 20px 10px 20px 40px">
        <img src="{{ URL::to('smart/images/gedung-sekolah.jpg') }}" alt="" class="img-thumbnail" width="300px" height="300px" style="float: left;display: block">
      </div>
      <div class="col-lg-9">
        <h1 class="title">Gedung Sekolah</h1>
        <p>Gedung sekolah yang indah dan bagus</p>
      </div>
    </div>

    <div class="col-xs-12 wow fadeInUp" data-wow-delay=".3s" style="margin-top: 60px">
      <div class="col-lg-3" style="padding: 20px 10px 20px 40px">
        <img src="http://sman11jakarta.sch.id/images/fasilitas/20140703101726.jpg" alt="" class="img-thumbnail" width="300px" height="300px" style="float: left;display: block">
      </div>
      <div class="col-lg-9">
        <h1 class="title">UKS</h1>
        <p>tempat UKS yang nyaman dan baik</p>
      </div>
    </div>

    <div class="col-xs-12 wow fadeInUp" data-wow-delay=".3s" style="margin-top: 60px">
      <div class="col-lg-3" style="padding: 20px 10px 20px 40px">
        <img src="http://sman11jakarta.sch.id/images/fasilitas/20140703103440.jpg" alt="" class="img-thumbnail" width="300px" height="300px" style="float: left;display: block">
      </div>
      <div class="col-lg-9">
        <h1 class="title">Musholla</h1>
        <p>Tempat ibadah untuk yang tenang dan bersih</p>
      </div>
    </div>

    <div class="col-xs-12 wow fadeInUp" data-wow-delay=".3s" style="margin-top: 60px">
      <div class="col-lg-3" style="padding: 20px 10px 20px 40px">
        <img src="http://sman11jakarta.sch.id/images/fasilitas/20140704125255.jpg" alt="" class="img-thumbnail" width="300px" height="300px" style="float: left;display: block">
      </div>
      <div class="col-lg-9">
        <h1 class="title">Ruang Guru</h1>
        <p>Ruang Guru yang bersih dan baik</p>
      </div>
    </div>

    <div class="col-xs-12 wow fadeInUp" data-wow-delay=".3s" style="margin-top: 60px">
      <div class="col-lg-3" style="padding: 20px 10px 20px 40px">
        <img src="http://sman11jakarta.sch.id/images/fasilitas/20160623092733.JPG" alt="" class="img-thumbnail" width="300px" height="300px" style="float: left;display: block">
      </div>
      <div class="col-lg-9">
        <h1 class="title">Ruang Lab</h1>
        <p>Ruang Lab yang baik dan lengkap</p>
      </div>
    </div>

    <div class="col-xs-12 wow fadeInUp" data-wow-delay=".3s" style="margin-top: 60px">
      <div class="col-lg-3" style="padding: 20px 10px 20px 40px">
        <img src="http://sman11jakarta.sch.id/images/fasilitas/20140703103229.jpg" alt="" class="img-thumbnail" width="300px" height="300px" style="float: left;display: block">
      </div>
      <div class="col-lg-9">
        <h1 class="title">Lapangan olahraga</h1>
        <p>Lapangan olahraga yang baik</p>
      </div>
    </div>
  </div>
</section>
@endsection