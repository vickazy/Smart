@extends('smart.templates.app')

@section('content')
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2>Gallery</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Gallery</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            </section><!--/#Page header-->
            <section id="gallery" class="gallery">
                <div class="container">
                    @foreach($galeri->chunk(3) as $data)
                    <div class="row">
                        @foreach($data as $value)
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated portfolio-item animated" data-wow-duration="500ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 0ms; -webkit-animation-delay: 0ms; animation-name: fadeInLeft; -webkit-animation-name: fadeInLeft;">
                                <div class="img-wrapper">
                                    <img src="{{URL::to('upload/galeri/'. $value['photo'])}}" style="max-width: 480px;max-height: 360px" class="img-responsive" alt="this is a title">
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="{{URL::to('upload/galeri/'. $value['photo'])}}"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </section>
           
@endsection