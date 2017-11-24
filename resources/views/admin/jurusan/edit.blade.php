@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i>Edit Jurusan</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:250px">
		<a href="{{route('admin.jurusan')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		<form action="{{route('admin.postUpdateJurusan', $data['id'])}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
					<div class="form-group{{$errors->has('nama_jurusan') ? ' has-error' : ' '}}">
						<label>Nama Jurusan</label>
						<input type="text" name="nama_jurusan" class="form-control" value="{{$data['nama_jurusan']}}">
						@if($errors->has('nama_jurusan'))
						<span class="help-block">{{$errors->first('nama_jurusan')}}</span>
						@endif
					</div>
			<div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ' '}}">
				<label>Deskripsi Jurusan</label>
				<textarea class="form-control" name="deskripsi"> {{$data['deskripsi']}}</textarea>
				@if($errors->has('deskripsi'))
				<span class="help-block">{{$errors->first('deskripsi')}}</span>
				@endif
			</div>
			<button type="submit" class="btn btn-warning btn-block">Edit Jurusan</button>
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