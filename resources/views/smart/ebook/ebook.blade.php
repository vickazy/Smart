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
                                    <div class="col-xs-3">Size</div>
                                    <div class="col-xs-3">Modified</div>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group list-group-body" style="">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6 text-left" style=" "> <span class="glyphicon glyphicon-file" style="color: #009b4c" aria-hidden="true"></span> Kurikulum 2016/2017 </div>
                                    <div class="col-xs-2" style="">500Kb</div>
                                    <div class="col-xs-2" style="">01-06-2017</div>
                                    <div class="col-xs-2" style=""><a href="#!" class="btn btn-primary btn-flat" style="color:white">Download</a></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6 text-left" style=" "> <span class="glyphicon glyphicon-file" style="color: #009b4c" aria-hidden="true"></span> Kurikulum 2016/2017 </div>
                                    <div class="col-xs-2" style="">500Kb</div>
                                    <div class="col-xs-2" style="">01-06-2017</div>
                                    <div class="col-xs-2" style=""><a href="#!" class="btn btn-primary btn-flat" style="color:white">Download</a></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6 text-left" style=" "> <span class="glyphicon glyphicon-file" style="color: #009b4c" aria-hidden="true"></span> Kurikulum 2016/2017 </div>
                                    <div class="col-xs-2" style="">500Kb</div>
                                    <div class="col-xs-2" style="">01-06-2017</div>
                                    <div class="col-xs-2" style=""><a href="#!" class="btn btn-primary btn-flat" style="color:white">Download</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection