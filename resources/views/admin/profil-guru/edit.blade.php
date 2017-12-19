@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i>Edit Guru</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:250px">
		<a href="{{route('admin.ProfilGuru')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		<form action="{{route('admin.postUpdateProfilGuru', $data['id'])}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-lg-3 col-xs-12">
					<div class="form-group{{$errors->has('nim') ? ' has-error' : ' '}}">
						<label>NIM</label>
						<input type="text" name="nim" class="form-control" placeholder="No NIM" value="{{$data['nim']}}">
						@if($errors->has('nim'))
						<span class="help-block">{{$errors->first('nim')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-3 col-xs-12">
					<div class="form-group{{$errors->has('golongan') ? ' has-error' : ' '}}">
						<label>Status Golongan</label>
						<input type="text" name="golongan" class="form-control" placeholder="status golongan" value="{{$data['golongan']}}">
						@if($errors->has('golongan'))
						<span class="help-block">{{$errors->first('golongan')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-3 col-xs-12">
					<div class="form-group{{$errors->has('jam_mengajar') ? ' has-error' : ' '}}">
						<label>Jam Mengajar</label>
						<input type="text" name="jam_mengajar" class="form-control" placeholder="09.00 - 13.00" value="{{$data['jam_mengajar']}}">
						@if($errors->has('jam_mengajar'))
						<span class="help-block">{{$errors->first('jam_mengajar')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-3 col-xs-12">
					<div class="form-group{{$errors->has('terhitung_mulai_tgl') ? ' has-error' : ' '}}">
						<label>Terhitung Mulai tgl</label>
						<input type="text" name="terhitung_mulai_tgl" class="form-control datepicker" placeholder="terhitung mulai tgl" value="{{$data['terhitung_mulai_tgl']}}">
						@if($errors->has('terhitung_mulai_tgl'))
						<span class="help-block">{{$errors->first('terhitung_mulai_tgl')}}</span>
						@endif
					</div>
				</div>
			</div>
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
						<label>Password Baru</label>
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
						<label>Nama Guru</label>
						<input type="text" name="nama" class="form-control" value="{{$data['nama']}}">
						@if($errors->has('nama'))
						<span class="help-block">{{$errors->first('nama')}}</span>
						@endif
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group{{$errors->has('bidang') ? ' has-error' : ' '}}">
						<label>Sebagai Guru apa ?</label>
						<input type="text" name="bidang" class="form-control" value="{{$data['bidang']}}">
						@if($errors->has('bidang'))
						<span class="help-block">{{$errors->first('bidang')}}</span>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
				<label>Upload Gambar</label>
				<input type="file" name="photo" class="form-control">
				@if($errors->has('photo'))
				<span class="help-block">{{$errors->first('photo')}}</span>
				@endif
			</div>
			<button type="submit" class="btn btn-warning btn-block">Edit Guru</button>
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