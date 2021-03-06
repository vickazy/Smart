@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Galeri</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-galeri" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Photo</a>
			<div class="collapse" id="tambah-galeri" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postPhotoJurusan')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
							<label>Upload Photo</label>
							<input type="file" name="photo" class="form-control">
							<input type="hidden" name="jurusan_id" value="{{Auth::guard('kprodi')->user()->jurusan_id}}">
							@if($errors->has('photo'))
							<span class="help-block">{{$errors->first('photo')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah Photo</button>
					</form>
				</div>
			</div>
		</div>
		@foreach($photoJurusan->chunk(4) as $data)
		<div class="row mt">
			@foreach($data as $value)
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 desc">
				<div class="project-wrapper">
					<div class="">
						<div class="photo-wrapper">
							<div class="photo">
								<a class="fancybox btn-photo" data-photo="{{$value['photo']}}" href="#modal-photo" data-toggle="modal"><img class="img-thumbnail" src="{{URL::to('upload/photo-jurusan/'. $value['photo'])}}" alt=""></a>
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
				<span class="pull-right">{{$photoJurusan->render()}}</span>
			</div>
			{{-- modal --}}
			<div class="modal fade" id="modal-photo">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<img class="img-thumbnail src" alt="" width="100%">
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection
		@section('customJs')
		<script src="{{URL::to('admin/js/fancybox/jquery.fancybox.js')}}"></script>
		<script type="text/javascript">
			$('.photo').on('click', '.btn-photo', function(e) {
				e.preventDefault();
				var photo = $(this).data('photo');
				var data = '/upload/photo-jurusan/' + photo;
				$('.modal-body .src').attr('src', data);
			})
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
						$.get("{{ route('admin.getDeletePhotoJurusan') }}", {id: id}, function (data) {
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