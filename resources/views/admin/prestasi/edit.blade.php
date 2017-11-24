@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i>Edit Prestasi</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:250px">
		<a href="{{route('admin.prestasi')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		<form action="{{route('admin.postUpdatePrestasi', $data['id'])}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
				<label>Prestasi</label>
				<input type="text" name="judul" class="form-control" value="{{$data['judul']}}">
				@if($errors->has('judul'))
				<span class="help-block">{{$errors->first('judul')}}</span>
				@endif
			</div>
			<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
				<label>Keterangan</label>
				<input type="text" name="isi" class="form-control" value="{{$data['isi']}}">
				@if($errors->has('isi'))
				<span class="help-block">{{$errors->first('isi')}}</span>
				@endif
			</div>
			<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
				<label>Upload Gambar</label>
				<input type="file" name="photo" class="form-control">
				@if($errors->has('photo'))
				<span class="help-block">{{$errors->first('photo')}}</span>
				@endif
			</div>
			<button type="submit" class="btn btn-warning btn-block">Edit Prestasi</button>
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