@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Jurusan </h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-guru" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Jurusan</a>
			<div class="collapse" id="tambah-guru" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postJurusan')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
								<div class="form-group{{$errors->has('nama_jurusan') ? ' has-error' : ' '}}">
									<label>Nama Jurusan</label>
									<input type="text" name="nama_jurusan" class="form-control">
									@if($errors->has('nama_jurusan'))
									<span class="help-block">{{$errors->first('nama_jurusan')}}</span>
									@endif
								</div>
						<div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ' '}}">
							<label>Deskripsi Jurusan</label>
							<textarea class="form-control" name="deskripsi"></textarea>
							@if($errors->has('deskripsi'))
									<span class="help-block">{{$errors->first('deskripsi')}}</span>
									@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah Jurusan</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Jurusan</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Nama Jurusan</th>
						<th>Deskripsi</th>
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
		ajax: '{{route('admin.getDataJurusan')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'nama_jurusan'},
			{data: 'deskripsi'},
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
			$.get("{{ route('admin.getDeleteJurusan') }}", {id: id}, function (data) {
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