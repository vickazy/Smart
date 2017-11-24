@extends("smart.templates.app")

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>E-Book</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">E-Book</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

    <div class="container">
        <h2>List Ebook</h2>
        <hr>
        <div class="row">
            <div class="col-xs-12" style="">
                <div class="panel panel-default list-group-panel">
                    <div class="panel-body">
                        <ul class="list-group list-group-header">
                            <li class="list-group-item list-group-body">
                                <div class="row">
                                    <div class="col-xs-6 text-left">Nama Ebook</div>
                                    <div class="col-xs-3">Upload pada tanggal</div>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group list-group-body" style="">
                            @foreach($ebook as $data)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6 text-left" style=" "> <span class="glyphicon glyphicon-file" style="color: #4FC3F7" aria-hidden="true"></span> {{$data['nama']}}</div>
                                    <div class="col-xs-2" style="">{{date('d-m-Y', strtotime($data['created_at']))}}</div>
                                    <div class="col-xs-2" style=""><a target="_blank" href="{{URL::to('upload/ebook/'. $data['file_path'])}}" class="btn btn-primary btn-flat" style="color:white">Download</a></div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <span class="pull-right">{{$ebook->render()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection