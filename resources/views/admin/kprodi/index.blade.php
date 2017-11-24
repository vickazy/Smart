@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Ketua Prodi</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-guru" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Ketua Prodi</a>
			<div class="collapse" id="tambah-guru" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postKprodi')}}" method="post" enctype="multipart/form-data">
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
									<label>Nama Ketua Prodi</label>
									<input type="text" name="nama" class="form-control">
									@if($errors->has('nama'))
									<span class="help-block">{{$errors->first('nama')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('jurusan_id') ? ' has-error' : ' '}}">
									<label>Sebagai Ketua Jurusan ?</label>
									<select name="jurusan_id" class="form-control select2" style="width: 100% !important">
										<option disabled selected="">-Pilih Jurusan-</option>
										@foreach($jurusan as $data)
											<option value="{{$data['id']}}">{{$data['nama_jurusan']}}</option>
										@endforeach
									</select>
									@if($errors->has('jurusan_id'))
									<span class="help-block">{{$errors->first('jurusan_id')}}</span>
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
						<button type="submit" class="btn btn-primary btn-block">Tambah Ketua Prodi</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Ketua Prodi</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Photo</th>
						<th>Username</th>
						<th>Nama</th>
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
		ajax: '{{route('admin.getDataKprodi')}}',
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
			$.get("{{ route('admin.getDeleteKprodi') }}", {id: id}, function (data) {
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