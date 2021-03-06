@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Photo Sampul Profile Berita </h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<form action="{{route('admin.postBgHome')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label>Ganti Photo Terbaru <small>(Note: ukuran 1600px X 550px)</small></label>
				<input type="file" name="photo" class="form-control">
				<input type="hidden" name="id" class="form-control" value="{{$bghome['id']}}">
				<br>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
		</form>
		<hr>
		<div class="row mt">
			<div class="col-lg-8 col-sm-12 col-lg-offset-2 desc">
				<div class="project-wrapper">
					<div class="project">
						@if($bghome['photo'])
						<div class="photo-wrapper">
							<div class="photo">
							<a class="fancybox" href="{{URL::to('upload/setting/'. $bghome['photo'])}}"><img class="img-thumbnail" src="{{URL::to('upload/setting/'. $bghome['photo'])}}" alt=""></a>
							</div>
							<div class="overlay"></div>
						</div>
						@else
						<div style="text-align: center;margin-bottom: 90px">
						<span><b>Image Not Found</b></span>
						</div>
						@endif
					</div>
				</div>
				</div>
				</div><!-- /row -->
			</div>
		</div>
			@endsection
			@section('customJs')
			<script src="{{URL::to('admin/js/fancybox/jquery.fancybox.js')}}"></script>
			@if (Session::has('success'))
			<script type="text/javascript">
				$(document).ready(function() {
						toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
				});
			</script>
			@endif
			@endsection