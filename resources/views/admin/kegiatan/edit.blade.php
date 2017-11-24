@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i>Edit Kegiatan</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:250px">
		<a href="{{route('admin.kegiatan')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		<form action="{{route('admin.postUpdateKegiatan', $data['id'])}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
						<label>Judul Kegiatan</label>
						<input type="text" name="judul" class="form-control" value="{{$data['judul']}}">
						@if($errors->has('judul'))
						<span class="help-block">{{$errors->first('judul')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('tgl_kegiatan') ? ' has-error' : ' '}}">
						<label>Tanggal Kegiatan</label>
						<input type="date" name="tgl_kegiatan" class="form-control" value="{{$data['tgl_kegiatan']}}">
						@if($errors->has('tgl_kegiatan'))
						<span class="help-block">{{$errors->first('tgl_kegiatan')}}</span>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
						<label>Upload Gambar</label>
						<input type="file" name="photo" class="form-control">
						@if($errors->has('photo'))
						<span class="help-block">{{$errors->first('photo')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('tempat') ? ' has-error' : ' '}}">
						<label>Tempat Kegiatan</label>
						<input type="text" name="tempat" class="form-control" value="{{$data['tempat']}}">
						@if($errors->has('tempat'))
						<span class="help-block">{{$errors->first('tempat')}}</span>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group{{$errors->has('kegiatan') ? ' has-error' : ' '}}">
				<label>Isi Kegiatan</label>
				<textarea class="form-control" name="isi"> {{$data['isi']}}</textarea>
				@if($errors->has('kegiatan'))
				<span class="help-block">{{$errors->first('kegiatan')}}</span>
				@endif
			</div>
			<button type="submit" class="btn btn-warning btn-block">Edit Kegiatan</button>
		</form>
	</div>
</div>
@endsection
@section('customJs')
@if (Session::has('success'))
<script type="text/javascript">
	$(document).ready(function() {
			toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
	});
</script>
@endif
@endsection