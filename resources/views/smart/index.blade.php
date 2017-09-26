@extends('smart.templates.app')
@section('content')
<section id="hero-area" style="background: url('{{ URL::to('smart/images/slider.jpg')  }}') no-repeat 50%;">
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
          <a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green" data-wow-delay=".9s" href="#works" data-section="#works">PRESTASI</a>
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
      <div class="col-md-6 col-sm-6">
        <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
          <h2>
          Visi & Misi
          </h2>
          <p>
            A. Visi<br> Sekolah historis berbasis Teknologi Informasi dan berwawasan lingkungan, mantap dalam IMTAQ, unggul dalam IPTEK, berprestasi dalam olahraga dan seni serta siap bersaing dalam menghadapi era global.
          </p>
          <p>
            B. Misi<br> 1. Menciptakan lingkungan yang harmonis dalam upaya meningkatkan keimanan dan ketaqwaan terhadap Tuhan yang Maha Kuasa; <br> 2. Menciptakan lingkungan pembelajaran yang kondusif dalam upaya meningkatkan mutu pembelajaran;<br> 3.
            Menciptakan lingkungan sekolah yang berwawasan adiwiyata, bersih, hijau dan terpelihara.<br>
          </p>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
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
<!-- #works -->
<!--
==================================================
Portfolio Section Start
================================================== -->
<section id="feature">
  <div class="container">
    <div class="section-heading">
      <h1 class="title wow fadeInDown" data-wow-delay=".3s">BERITA</h1>
    </div>
    <div class="row wow fadeInDown" data-wow-delay=".3s">
      <div id="carousel-homepage-latestnews" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="height: 613px;">
            <div class="col-sm-3 latestnews-box">
              <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Masa Pengenalan Lingkungan Sekolah (MPLS) 2016"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/06/mpls-250x250.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/06/mpls-250x250.jpg 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/06/mpls-150x150.jpg 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/06/mpls-174x174.jpg 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
              <div class="latesnews-content">
                <h3 class="latestnews-title"><a href="#!" title="Masa Pengenalan Lingkungan Sekolah (MPLS) 2016">Masa Pengenalan Lingkungan Sekolah (MPLS) 2016</a></h3>
                <p>Assalammualaikum. Wr. Wb. Diberitahukan kepada seluruh orang tua siswa baru untuk menghadiri rapat pada Sabtu, 16 Juli 2016, pkl. 08.00 s.d. selesai, tempat aula bawah SMP-SMA Al Muttaqin. Para siswa baru melaksanakan Masa Pengenalan Lingkungan
                  Sekolah (MPLS) 2016, mulai tanggal 16 s.d. 18 Juli 2016. &nbsp; Perlengkapan Peserta Masa Pengenalan Lingkungan Sekolah (MPLS) 2016 Hari <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2016/06/29/masa-pengenalan-lingkungan-sekolah-mpls-2016/"
                    rel="nofollow"><span class="sr-only">Read more about Masa Pengenalan Lingkungan Sekolah (MPLS) 2016</span>[…]</a></p>
                  </div>
                </div>
                <!-- .latestnews-box"> -->
                <div class="col-sm-3 latestnews-box">
                  <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-250x250.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-250x250.jpg 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-150x150.jpg 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-174x174.jpg 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                  <div class="latesnews-content">
                    <h3 class="latestnews-title"><a href="#!" title="Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016">Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016</a></h3>
                    <p>PANDUAN (PPDB) PENERIMAAN PESERTA DIDIK BARU SMA AL MUTTAQIN FULLDAY SCHOOL TAHUN PELAJARAN 2015-2016 &nbsp; PENDAHULUAN Badan Akreditasi Sekolah/Madrasah (BAS/M) Provinsi Jawa Barat telah menilai dan menetapkan SMA Al Muttaqin Fullday
                      School sebagai sekolah dengan predikat akreditasi “A” kriteria sebagai sekolah Amat Baik dengan nilai 98,76. Nilai akreditasi SMA Al Muttaqin Fullday School merupakan salah <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2016/04/24/penerimaan-peserta-didik-baru-sma-al-muttaqin-2016/"
                        rel="nofollow"><span class="sr-only">Read more about Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016</span>[…]</a></p>
                      </div>
                    </div>
                    <!-- .latestnews-box"> -->
                    <div class="col-sm-3 latestnews-box">
                      <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-250x250.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-250x250.jpg 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-150x150.jpg 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-174x174.jpg 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                      <div class="latesnews-content">
                        <h3 class="latestnews-title"><a href="#!" title="Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015">Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015</a></h3>
                        <p>BANDUNG, itb.ac.id – Mendapatkan beasiswa selama menempuh pendidikan di perguruan tinggi merupakan impian sebagian besar mahasiswa. Terlebih saat ini banyak pemberi beasiswa dari instansi dan organisasi yang tidak hanya memberikan beasiswa
                          dalam bentuk bantuan dana pendidikan namun juga memberikan pelatihan softskill yang diperlukan mahasiswa. Pada akhir bulan Mei yang lalu, terpilih mahasiswa/i Institut Teknologi Bandung <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2015/08/07/alumni-sma-al-muttaqin-dapatkan-beasiswa-panasonic-2015/"
                            rel="nofollow"><span class="sr-only">Read more about Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015</span>[…]</a></p>
                          </div>
                        </div>
                        <!-- .latestnews-box"> -->
                        <div class="col-sm-3 latestnews-box">
                          <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Pemilu Online Kreasi SMA Al-Muttaqin"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/pemilu-digital-250x250.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="Pemilu Digital SMA Al-Muttaqin" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/pemilu-digital-250x250.png 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/pemilu-digital-150x150.png 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/pemilu-digital-174x174.png 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                          <div class="latesnews-content">
                            <h3 class="latestnews-title"><a href="#!" title="Pemilu Online Kreasi SMA Al-Muttaqin">Pemilu Online Kreasi SMA Al-Muttaqin</a></h3>
                            <p>Pembangunan Negara secara seutuhnya tidak terlepas dari peran pemimpin yang mengarahkan rakyat kepada kemajuan suatu bangsa dan Negara, terlepas di Indonesia dengan berakhirnya pemilu yang sudah dilaksankan dengan memakan biaya yang cukup
                              fantastis sekiranya menjadi pemikiran pemuda saat ini yang terus berfikir secara kreatif agar pengelolaan tidak terjadi pemborosan yang kurang berarti karena belum tentu <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2015/07/30/pemilu-online-kreasi-sma-al-muttaqin/"
                                rel="nofollow"><span class="sr-only">Read more about Pemilu Online Kreasi SMA Al-Muttaqin</span>[…]</a></p>
                              </div>
                            </div>
                            <!-- .latestnews-box"> -->
                            <div class="clear"></div>
                          </div>
                          <div class="item" style="height: 613px;">
                            <div class="col-sm-3 latestnews-box">
                              <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="M Reza Alfath Membuat Bangga Keluarga, SMA Al-Muttaqin, dan Daerahnya"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/rezaalfath2-250x250.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="Reza Alfath" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/rezaalfath2-250x250.jpg 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/rezaalfath2-150x150.jpg 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/rezaalfath2-174x174.jpg 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                              <div class="latesnews-content">
                                <h3 class="latestnews-title"><a href="#!" title="M Reza Alfath Membuat Bangga Keluarga, SMA Al-Muttaqin, dan Daerahnya">M Reza Alfath Membuat Bangga Keluarga, SMA Al-Muttaqin, dan Daerahnya</a></h3>
                                <p>Anak yang masih duduk di kelas 3 SMA Al-Muttaqin ini adalah anak yang biasa biasa saja awalnya, hidupnya mulai berubah sejak ia terpilih sebagai ketua Organisasi UKS di SMP Al-Muttaqin dan kemudian terpilih sebagai ketua OSIS di SMA Al-Muttaqin
                                  kota Tasikmalaya. Berbagai perlombaan tingkat kota/kabupaten, bahkan tingkat Nasionalpun pernah ia raih, tetapi tidak membuat anak <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2014/11/01/m-reza-alfath-membuat-bangga-keluarga-sma-al-muttaqin-dan-daerahnya/"
                                    rel="nofollow"><span class="sr-only">Read more about M Reza Alfath Membuat Bangga Keluarga, SMA Al-Muttaqin, dan Daerahnya</span>[…]</a></p>
                                  </div>
                                </div>
                                <!-- .latestnews-box"> -->
                                <div class="col-sm-3 latestnews-box">
                                  <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Al-muttaqin Wakili Forum Nasional"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/parlemen-remaja-250x250.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="SMA Al-Muttaqin Parlemen Remaja" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/parlemen-remaja-250x250.jpg 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/parlemen-remaja-150x150.jpg 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/07/parlemen-remaja-174x174.jpg 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                                  <div class="latesnews-content">
                                    <h3 class="latestnews-title"><a href="#!" title="Al-muttaqin Wakili Forum Nasional">Al-muttaqin Wakili Forum Nasional</a></h3>
                                    <p>Sekolah Swasta Pendidikan Islam SMA Almuttaqin Fulldayschool Kota Tasikmalaya, kembali terpilih mewakili Jawa Barat dalam acara Parlemen Remaja VI yang diselenggarakan Direktorat Kemahasiswaan Universitas Indonesia dan Sekretariat Dewan
                                      Perwakilan Rakyat RI. Dua siswi terpilih, Affrilia Utami dan Fuzi Faujiyah siap berkemas menuju gedung DPR setelah lolos pada tahap seleksi awal membuat esai. Acara yang ke-6 <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2012/11/23/al-muttaqin-wakili-forum-nasional/"
                                        rel="nofollow"><span class="sr-only">Read more about Al-muttaqin Wakili Forum Nasional</span>[…]</a></p>
                                      </div>
                                    </div>
                                    <!-- .latestnews-box"> -->
                                    <div class="col-sm-3 latestnews-box">
                                      <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-250x250.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-250x250.jpg 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-150x150.jpg 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2016/04/Upload-174x174.jpg 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                                      <div class="latesnews-content">
                                        <h3 class="latestnews-title"><a href="#!" title="Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016">Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016</a></h3>
                                        <p>PANDUAN (PPDB) PENERIMAAN PESERTA DIDIK BARU SMA AL MUTTAQIN FULLDAY SCHOOL TAHUN PELAJARAN 2015-2016 &nbsp; PENDAHULUAN Badan Akreditasi Sekolah/Madrasah (BAS/M) Provinsi Jawa Barat telah menilai dan menetapkan SMA Al Muttaqin Fullday
                                          School sebagai sekolah dengan predikat akreditasi “A” kriteria sebagai sekolah Amat Baik dengan nilai 98,76. Nilai akreditasi SMA Al Muttaqin Fullday School merupakan salah <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2016/04/24/penerimaan-peserta-didik-baru-sma-al-muttaqin-2016/"
                                            rel="nofollow"><span class="sr-only">Read more about Penerimaan Peserta Didik Baru SMA AL MUTTAQIN 2016</span>[…]</a></p>
                                          </div>
                                        </div>
                                        <!-- .latestnews-box"> -->
                                        <div class="col-sm-3 latestnews-box">
                                          <div class="latestnews-img"><a class="latestnews-img-a" href="#!" title="Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015"><img src="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-250x250.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-250x250.jpg 250w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-150x150.jpg 150w, http://sma-almuttaqin-tasikmalaya.sch.id/site/wp-content/uploads/2015/08/IMG_6907-174x174.jpg 174w" sizes="(max-width: 250px) 100vw, 250px" width="250" height="250"></a></div>
                                          <div class="latesnews-content">
                                            <h3 class="latestnews-title"><a href="#!" title="Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015">Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015</a></h3>
                                            <p>BANDUNG, itb.ac.id – Mendapatkan beasiswa selama menempuh pendidikan di perguruan tinggi merupakan impian sebagian besar mahasiswa. Terlebih saat ini banyak pemberi beasiswa dari instansi dan organisasi yang tidak hanya memberikan beasiswa
                                              dalam bentuk bantuan dana pendidikan namun juga memberikan pelatihan softskill yang diperlukan mahasiswa. Pada akhir bulan Mei yang lalu, terpilih mahasiswa/i Institut Teknologi Bandung <a href="http://sma-almuttaqin-tasikmalaya.sch.id/site/blog/2015/08/07/alumni-sma-al-muttaqin-dapatkan-beasiswa-panasonic-2015/"
                                                rel="nofollow"><span class="sr-only">Read more about Alumni SMA Al-Muttaqin Dapatkan Beasiswa Panasonic 2015</span>[…]</a></p>
                                              </div>
                                            </div>
                                            <!-- .latestnews-box"> -->
                                            <div class="clear"></div>
                                          </div>
                                        </div>
                                        <!-- .carousel-inner -->
                                        <a class="left carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="prev">
                                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-homepage-latestnews" role="button" data-slide="next">
                                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a></div>
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
                                            <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                  @endsection