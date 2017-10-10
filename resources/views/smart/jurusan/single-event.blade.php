@extends("smart.templates.app")
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>{{ $event['judul'] }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <span>Tanggal Event : <b>{{date('d-M-Y', strtotime($event['tgl_event']))}}</b></span>
                        </li>
                        <li>
                            <span>Tempat : <b>{{$event['tempat']}}</b></span>
                        </li>
                    </ol>
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
                        <img class="img-responsive" alt="" src="{{URL::to('upload/event/'.$event['photo'])}}">
                    </div>
                    <div class="post-content">
                        {!! $event['isi'] !!}
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