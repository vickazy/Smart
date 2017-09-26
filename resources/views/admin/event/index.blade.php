@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Event Sekolah</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-event" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Event</a>
			<div class="collapse" id="tambah-event" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postEvent')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
									<label>Judul Event</label>
									<input type="text" name="judul" class="form-control">
									@if($errors->has('judul'))
									<span class="help-block">{{$errors->first('judul')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Kategori Event</label>
									<div class="input-group">
										<select class="form-control select2" id="select-kategori" name="kategori_event_id" style="width: 100% !important">
											<option selected disabled>- Kategori Event -</option>
											@foreach($kategoriEvent as $data)
											<option value="{{$data['id']}}">{{$data['nama']}}</option>
											@endforeach
										</select>
										<div class="input-group-addon"><a href="#modal-kategori" data-toggle="modal"><i class="fa fa-plus"></i></a></div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('tgl_event') ? ' has-error' : ' '}}">
									<label>Tanggal Event</label>
									<input type="date" name="tgl_event" class="form-control">
									@if($errors->has('tgl_event'))
									<span class="help-block">{{$errors->first('tgl_event')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('tempat') ? ' has-error' : ' '}}">
									<label>Tempat Event</label>
									<input type="text" name="tempat" class="form-control">
									@if($errors->has('tempat'))
									<span class="help-block">{{$errors->first('tempat')}}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
							<label>Isi Event</label>
							<textarea class="form-control" name="isi" id="isi-berita"></textarea>
							@if($errors->has('isi'))
							<span class="help-block">{{$errors->first('isi')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah Event</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Event</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Judul Event</th>
						<th>Tanggal Event</th>
						<th>Action</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
{{-- modal kategori --}}
<div class="modal fade" id="modal-kategori">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Kategori</h4>
			</div>
			<div class="modal-body">
				<form id="frm-kategori">
					<label>Tambah Kategori</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah Kategori</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript" src="{{URL::to('node_modules/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
	$('#frm-kategori').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.post("{{route('admin.postKategoriEvent')}}", data, function(data) {
			toastr.success('Success!', 'Kategori berhasil di tambahkan!');
				$('#select-kategori').append($('<option />', {
						value: data.id,
						text: data.nama,
					}));
			$('#modal-kategori').modal('hide');
		});
	});
	$('#datatables').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{route('admin.getDataEvent')}}',
		columns: [
		{data: 'DT_Row_Index', orderable: false, searchable: false},
		{data: 'judul'},
		{data: 'tgl_event'},
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
			$.get("{{ route('admin.getDeleteEvent') }}", {id: id}, function (data) {
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