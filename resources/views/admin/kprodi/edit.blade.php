@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i>Edit Ketua Prodi</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:250px">
		<a href="{{route('admin.kprodi')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		<form action="{{route('admin.postUpdateKprodi', $data['id'])}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('username') ? ' has-error' : ' '}}">
						<label>Username</label>
						<input type="text" name="username" class="form-control" value="{{$data['username']}}">
						@if($errors->has('username'))
						<span class="help-block">{{$errors->first('username')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('password') ? ' has-error' : ' '}}">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
						@if($errors->has('password'))
						<span class="help-block">{{$errors->first('password')}}</span>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('nama') ? ' has-error' : ' '}}">
						<label>Nama Ketua Prodi</label>
						<input type="text" name="nama" class="form-control" value="{{$data['nama']}}">
						@if($errors->has('nama'))
						<span class="help-block">{{$errors->first('nama')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('jurusan_id') ? ' has-error' : ' '}}">
						<label>Sebagai Ketua Jurusan ?</label>
						<select name="jurusan_id" class="form-control select2" style="width: 100% !important">
										@foreach($jurusan as $datas)
											<option value="{{$datas['id']}}" {{$data['jurusan_id'] == $datas['id'] ? 'selected' : ' '}}>{{$datas['nama_jurusan']}}</option>
										@endforeach
									</select>
						@if($errors->has('jurusan_id'))
						<span class="help-block">{{$errors->first('jurusan_id')}}</span>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
				<label>Upload Gambar baru</label>
				<input type="file" name="photo" class="form-control">
				@if($errors->has('photo'))
				<span class="help-block">{{$errors->first('photo')}}</span>
				@endif
			</div>
			<button type="submit" class="btn btn-warning btn-block">Edit Ketua Prodi</button>
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