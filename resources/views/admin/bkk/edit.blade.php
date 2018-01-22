@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i>Edit Bkk</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:100px">
		<a href="{{route('admin.Bkk')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		<form action="{{route('admin.updateBkk', $bkk['id'])}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
				<label>Judul</label>
				<input type="text" name="judul" class="form-control" value="{{$bkk['judul']}}">
				@if($errors->has('judul'))
				<span class="help-block">{{$errors->first('judul')}}</span>
				@endif
			</div>
			<div class="form-group{{$errors->has('file') ? ' has-error' : ' '}}">
				<label>Upload Gambar / Video (max:20mb)</label>
				<input type="file" name="file" class="form-control">
				@if($errors->has('file'))
				<span class="help-block">{{$errors->first('file')}}</span>
				@endif
			</div>
			<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
				<label>Isi</label>
				<textarea class="form-control" name="isi" id="isi-berita">{{$bkk['isi']}}</textarea>
				@if($errors->has('isi'))
				<span class="help-block">{{$errors->first('isi')}}</span>
				@endif
			</div>
			<button type="submit" class="btn btn-warning btn-block">Update</button>
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