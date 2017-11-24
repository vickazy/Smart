@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{$berita['judul']}}</h2>
                    <div class="portfolio-meta">
                        <span>{{date('F d, Y', strtotime($berita['created_at']))}}</span>|
                        <span> Category: {{$berita['kategoriBerita']['nama']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-img">
                        @if($berita['type_file'] == 'photo')
                        <img class="img-responsive" alt="" src="{{URL::to('upload/berita/'.$berita['photo'])}}">
                        @else
                        <video width="100%" controls>
                            <source src="{{URL::to('upload/berita/'.$berita['photo'])}}" type="video/mp4">
                            <source src="{{URL::to('upload/berita/'.$berita['photo'])}}" type="video/3gp">
                            <source src="{{URL::to('upload/berita/'.$berita['photo'])}}" type="video/avi">
                        </video>
                        @endif
                    </div>
                    <div class="post-content">
                        {!! $berita['isi'] !!}
                        </div>
                        {{-- <ul class="social-share">
                            <h4>Share this article</h4>
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
                        </ul> --}}
                    </div>
                </div>
            </section>
            @endsection
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="comments">
                        <div class="media">
                            <a href="" class="pull-left">
                                <img alt="" src="images/avater.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                Jonathon Andrew</h4>
                                <p class="text-muted">
                                    12 July 2013, 10:20 PM
                                </p>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                </p>
                                <a href="">Reply</a>
                                <hr>
                                Nested media object
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img alt="" src="images/avater-1.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Tom Cruse </h4>
                                        <p class="text-muted">
                                            12 July 2013, 10:20 PM
                                        </p>
                                        <p>
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </p>
                                    </div>
                                </div>
                                end media
                                <hr>
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img alt="" src="images/avater-1.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Nicolus Carolus </h4>
                                        <p class="text-muted">
                                            12 July 2013, 10:20 PM
                                        </p>
                                        <p>
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </p>
                                    </div>
                                </div>
                                end media
                            </div>
                        </div>
                        <div class="media">
                            <a href="" class="pull-left">
                                <img alt="" src="images/avater-2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                Rob Martin</h4>
                                <p class="text-muted">
                                    12 July 2013, 10:20 PM
                                </p>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                </p>
                                <a href="">Reply</a>
                            </div>
                        </div>
                        <div class="media">
                            <a href="" class="pull-left">
                                <img alt="" src="images/avater-2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                Mastarello </h4>
                                <p class="text-muted">
                                    12 July 2013, 10:20 PM
                                </p>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                </p>
                                <a href="">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="post-comment">
                        <h3>Leave a Reply</h3>
                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <input type="text" class="col-lg-12 form-control" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="col-lg-12 form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea class=" form-control" rows="8" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <p>
                            </p>
                            <p>
                                <button class="btn btn-send" type="submit">Comment</button>
                            </p>
                            <p></p>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->