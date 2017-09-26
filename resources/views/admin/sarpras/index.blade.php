@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Sarpras Sekolah</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-sarpras" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Sapras</a>
			<div class="collapse" id="tambah-sarpras" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postSarpras')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
								<div class="form-group{{$errors->has('nama') ? ' has-error' : ' '}}">
									<label>Nama Sarpras</label>
									<input type="text" name="nama" class="form-control">
									@if($errors->has('nama'))
									<span class="help-block">{{$errors->first('nama')}}</span>
									@endif
								</div>
						<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
							<label>Upload Gambar</label>
							<input type="file" name="photo" class="form-control">
							@if($errors->has('photo'))
							<span class="help-block">{{$errors->first('photo')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
							<label>Keterangan Sarpras</label>
							<textarea class="form-control" name="isi" id="isi-berita"></textarea>
							@if($errors->has('isi'))
							<span class="help-block">{{$errors->first('isi')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah Sarpras</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Sarpras</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Nama Sarpras</th>
						<th>Keterangan Sarpras</th>
						<th>Action</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
@section('customJs')
<script type="text/javascript" src="{{URL::to('node_modules/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
	$('#datatables').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{route('admin.getDataSarpras')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'nama'},
			{data: 'isi'},
			{data: 'action', name: 'detail', orderable: false, searchable: false},
		]
	});
		CKEDITOR.replace('isi-berita');
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
			$.get("{{ route('admin.getDeleteBerita') }}", {id: id}, function (data) {
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