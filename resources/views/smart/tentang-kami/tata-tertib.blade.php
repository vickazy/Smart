@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Tata Tertib</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Tata Tertib</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <section class="container">
        <div class="row" style="margin-top: 52px">
            <div class="box-shadow" style=" box-shadow: 5px 5px 8px #E0E0E0;
  height: auto;word-wrap: break-word;padding: 20px 10px">
                {!! $data['isi'] !!}
            </div>
        </div>
    </section>
    @endsection