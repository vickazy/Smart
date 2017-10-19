@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Berita Terbaru</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <section id="blog-full-width">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="search widget">
                            <form action="" method="get" class="searchform" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
                                    </span>
                                    </div><!-- /input-group -->
                                </form>
                            </div>
                            <div class="author widget">
                            <img class="img-responsive" src="{{URL::to('upload/setting/'. $bgHome['photo'])}}">
                                <div class="author-body text-center">
                                    <div class="author-img">
                                        <img src="{{URL::to('upload/tentang-kami/profil-sekolah/'. $visiMisi['photo'])}}">
                                    </div>
                                    <div class="author-bio">
                                        <h3>Kepala Sekolah</h3>
                                        <p>Orang yang tak mau merasakan derita menuntut ilmu sejenak saja, Akan ditimpa hinanya kebodohan sepanjang hidupnya.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="categories widget">
                                <h3 class="widget-head">Categories</h3>
                                <ul>
                                    @foreach($kategoriBerita as $kategori)
                                    <li>
                                        <a href="">{{$kategori['nama']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="recent-post widget">
                                <h3>Recent Posts</h3>
                                <ul>
                                    @foreach($recent as $value)
                                    <li>
                                        <a href="#">{{$value['judul']}}</a><br>
                                        <time>{{date('d F, Y', strtotime($value['created_at']))}}</time>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        @foreach($data as $berita)
                        <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                            <div class="blog-post-image">
                                <a href="#!"><img class="img-responsive" src="{{URL::to("upload/berita/". $berita['photo'])}}" alt="" /></a>
                            </div>
                            <div class="blog-content">
                                <h2 class="blogpost-title">
                                <a href="#!">{{$berita['judul']}}</a>
                                </h2>
                                <div class="blog-meta">
                                    <span>{{date('F d, Y', strtotime($berita['created_at']))}}</span>
                                    <span>by <a href="#!">Admin</a></span>
                                    <span><a href="#!">{{$berita['kategoriBerita']['nama']}}</a></span>
                                </div>
                                <p>
                                    {{ substr(strip_tags($berita['isi']), 0, 300) }}{{strlen($berita['isi']) > 300 ? '...' : ' '}}
                                </p>
                                <a href="{{route('berita.single', [str_slug($berita['judul']), $berita['id']])}}" class="btn btn-dafault btn-details">Baca Selengkapnya</a>
                            </div>
                        </article>
                        @endforeach
                        <span class="pull-right">{{ $data->render() }}</span>
                    </div>
                </div>
            </section>
            @endsection