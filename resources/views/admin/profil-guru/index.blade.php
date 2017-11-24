@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Profil Guru</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-guru" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Guru</a>
			<div class="collapse" id="tambah-guru" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postProfilGuru')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('username') ? ' has-error' : ' '}}">
									<label>Username</label>
									<input type="text" name="username" class="form-control">
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
									<label>Nama Guru</label>
									<input type="text" name="nama" class="form-control">
									@if($errors->has('nama'))
									<span class="help-block">{{$errors->first('nama')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('bidang') ? ' has-error' : ' '}}">
									<label>Sebagai Guru apa ?</label>
									<input type="text" name="bidang" class="form-control">
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
						<button type="submit" class="btn btn-primary btn-block">Tambah Guru</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Guru</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Photo Guru</th>
						<th>Username</th>
						<th>Nama Guru</th>
						<th>Action</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#datatables').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{route('admin.getDataProfilGuru')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'photo'},
			{data: 'username'},
			{data: 'nama'},
			{data: 'action', name: 'detail', orderable: false, searchable: false},
		]
	});
$('#datatables').on('click','.delete', function(e) {
		var id = $(this).data('id');
		$.confirm({
			icon: 'fa fa-warning',
			title: 'Alert !',
			content: 'Apakah anda ingin menghapus data ini ?',
			type: 'red',
			typeAnimated: true,
			buttons: {
			confirm: function () {
			$.get("{{ route('admin.getDeleteProfilGuru') }}", {id: id}, function (data) {
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