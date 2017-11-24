@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Kegiatan Jurusan {{$kprodi['jurusan']['nama_jurusan']}}</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-guru" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Kegiatan Jurusan</a>
			<div class="collapse" id="tambah-guru" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postKegiatan')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
									<label>Judul Kegiatan</label>
									<input type="text" name="judul" class="form-control">
									@if($errors->has('judul'))
									<span class="help-block">{{$errors->first('judul')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('tgl_kegiatan') ? ' has-error' : ' '}}">
									<label>Tanggal Kegiatan</label>
									<input type="date" name="tgl_kegiatan" class="form-control">
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
									<input type="text" name="tempat" class="form-control">
									@if($errors->has('tempat'))
									<span class="help-block">{{$errors->first('tempat')}}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group{{$errors->has('kegiatan') ? ' has-error' : ' '}}">
							<label>Isi Kegiatan</label>
							<textarea class="form-control" name="isi"></textarea>
							@if($errors->has('kegiatan'))
									<span class="help-block">{{$errors->first('kegiatan')}}</span>
									@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah Kegiatan</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Kegiatan</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Photo</th>
						<th>Judul Kegiatan</th>
						<th>Tanggal Kegiatan</th>
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
		ajax: '{{route('admin.getDataKegiatan')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'photo'},
			{data: 'judul'},
			{data: 'tgl_kegiatan'},
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
			$.get("{{ route('admin.getDeleteKegiatan') }}", {id: id}, function (data) {
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