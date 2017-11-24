@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i> Galeri</h3>
    <div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
        <div>
            <a href="#tambah-galeri" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Photo</a>
            <div class="collapse" id="tambah-galeri" style="margin-top:5px;margin-bottom: 50px">
                <div class="well">
                    <form action="{{route('admin.postGaleri')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
                            <label>Upload Photo</label>
                            <input type="file" name="photo" class="form-control">
                            @if($errors->has('photo'))
                            <span class="help-block">{{$errors->first('photo')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Tambah Photo</button>
                    </form>
                </div>
            </div>
        </div>
        @foreach($galeri->chunk(4) as $data)
        <div class="row mt">
            @foreach($data as $value)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 desc">
                <div class="project-wrapper">
                    <div class="project">
                        <div class="photo-wrapper">
                            <div class="photo">
                                <a class="fancybox" href="{{URL::to('upload/galeri/'. $value['photo'])}}"><img class="img-thumbnail" src="{{URL::to('upload/galeri/'. $value['photo'])}}" alt=""></a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div id="hapus" style="text-align: center;margin-top: 10px">
                        <a href="#!" class="btn btn-danger btn-sm delete" data-id="{{$value['id']}}">Delete</a>
                    </div>
                </div>
                </div><!-- col-lg-4 -->
                @endforeach
                </div><!-- /row -->
            @endforeach

            <span class="pull-right">{{$galeri->render()}}</span>
            </div>
        </div>
            @endsection
            @section('customJs')
            <script src="{{URL::to('admin/js/fancybox/jquery.fancybox.js')}}"></script>
            <script type="text/javascript">
                $('.delete').on('click', function(e) {
                        var id = $(this).data('id');
                        $.confirm({
                            icon: 'fa fa-warning',
                            title: 'Alert !',
                            content: 'Apakah anda ingin menghapus data ini ?',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                            confirm: function () {
                            $.get("{{ route('admin.getDeleteGaleri') }}", {id: id}, function (data) {
                                // console.log(data);
                                location.reload();
                            });
                            },
                            cancel: function () {
                            
                            },
                            }
                        });
                    });
            </script>
            @if (Session::has('success'))
            <script type="text/javascript">
                $(document).ready(function() {
                        toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
                });
            </script>
            @endif
            @endsection