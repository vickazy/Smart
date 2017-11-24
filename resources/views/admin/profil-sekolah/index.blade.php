@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Profil Sekolah</h3>
	<div class="content-panel" style="padding:10px 10px;">
		<div>
			<div class="" id="tambah" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postProfilSekolah')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('nama') ? ' has-error' : ' '}}">
									<label>Nama Kepala Sekolah</label>
									<input type="text" name="nama" class="form-control" value="{{$data['nama']}}">
									<input type="hidden" name="id" value="{{$data['id']}}">
									@if($errors->has('nama'))
									<span class="help-block">{{$errors->first('nama')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('quote') ? ' has-error' : ' '}}">
									<label>Quote Kepala Sekolah</label>
									<input type="text" name="quote" class="form-control" value="{{$data['quote']}}">
									@if($errors->has('quote'))
									<span class="help-block">{{$errors->first('quote')}}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
							<label>Upload Gambar Kepala Sekolah</label>
							<input type="file" name="photo" class="form-control">
							@if($errors->has('photo'))
							<span class="help-block">{{$errors->first('photo')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('visi') ? ' has-error' : ' '}}">
							<label>Visi</label>
							<textarea class="form-control" name="visi" id="visi">{{ $data['visi'] }}</textarea>
							@if($errors->has('visi'))
							<span class="help-block">{{$errors->first('visi')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('misi') ? ' has-error' : ' '}}">
							<label>Misi</label>
							<textarea class="form-control" name="misi" id="misi">{{ $data['misi'] }}</textarea>
							@if($errors->has('misi'))
							<span class="help-block">{{$errors->first('misi')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Simpan Profil Sekolah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- galeri photo --}}
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Galeri Photo & Video</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<span><a href="#modal-photo" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Photo/Video</a></span>
		<div>
			@foreach($galeri->chunk(4) as $data)
			<div class="row mt">
				@foreach($data as $value)
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 desc">
					<div class="project-wrapper">
						<div class="project">
							<div class="photo-wrapper">
								@if($value['type'] == 'photo')
								<div class="photo">
									<a class="fancybox" href="{{URL::to('upload/tentang-kami/galeri-profile/'. $value['file'])}}"><img class="img-thumbnail" src="{{URL::to('upload/tentang-kami/galeri-profile/'. $value['file'])}}" alt=""></a>
								</div>
								<div class="overlay"></div>
								@else
								<video width="290" controls>
									<source src="{{URL::to('upload/tentang-kami/galeri-profile/'.$value['file'])}}" type="video/mp4">
									<source src="{{URL::to('upload/tentang-kami/galeri-profile/'.$value['file'])}}" type="video/3gp">
									<source src="{{URL::to('upload/tentang-kami/galeri-profile/'.$value['file'])}}" type="video/avi">
								</video>
								@endif
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
		</div>
		{{-- modal-photo --}}
		<div class="modal fade" id="modal-photo">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Upload File</h4>
					</div>
					<div class="modal-body">
						<form action="{{route('admin.uploadFile')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group{{$errors->has('type') ? ' has-error' : ' '}}">
								<label>Type File</label>
								<select class="form-control" name="type">
									<option disabled selected>-Type File-</option>
									<option value="photo">Photo</option>
									<option value="video">Video</option>
								</select>
								@if($errors->has('type'))
								<span class="help-block">{{$errors->first('type')}}</span>
								@endif
							</div>
							<div class="form-group{{$errors->has('file') ? ' has-error' : ' '}}">
								<label>Upload File</label>
								<input type="file" name="file" class="form-control">
								@if($errors->has('file'))
								<span class="help-block">{{$errors->first('file')}}</span>
								@endif
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Upload</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
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
							$.get("{{ route('admin.deleteFile') }}", {id: id}, function (data) {
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