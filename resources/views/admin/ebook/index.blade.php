@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Ebook</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-ebook" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Ebook</a>
			<div class="collapse" id="tambah-ebook" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postEbook')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group{{$errors->has('nama') ? ' has-error' : ' '}}">
							<label>Nama Ebook</label>
							<input type="text" name="nama" class="form-control">
							@if($errors->has('nama'))
							<span class="help-block">{{$errors->first('nama')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('file_path') ? ' has-error' : ' '}}">
							<label>Upload File</label>
							<input type="file" name="file_path" class="form-control">
							@if($errors->has('file_path'))
							<span class="help-block">{{$errors->first('file_path')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah Ebook</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Ebook</h3>
				<table id="datatables" class="table table-striped table-bordered">
					<thead>
						<th>No</th>
						<th>Nama Ebook</th>
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
		ajax: '{{route('admin.getDataEbook')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
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
			$.get("{{ route('admin.getDeleteEbook') }}", {id: id}, function (data) {
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