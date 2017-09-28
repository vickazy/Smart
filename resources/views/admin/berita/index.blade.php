@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Berita Sekolah</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-berita" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah berita</a>
			<div class="collapse" id="tambah-berita" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postBerita')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
									<label>Judul Berita</label>
									<input type="text" name="judul" class="form-control">
									@if($errors->has('judul'))
									<span class="help-block">{{$errors->first('judul')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Kategori Berita</label>
									<div class="input-group">
										<select class="form-control select2" id="select-kategori" name="kategori_id" style="width: 100% !important">
											<option selected disabled>- Kategori Berita -</option>
											@foreach($kategoriBerita as $data)
											<option value="{{$data['id']}}">{{$data['nama']}}</option>
											@endforeach
										</select>
										<div class="input-group-addon"><a href="#modal-kategori" data-toggle="modal"><i class="fa fa-plus"></i></a></div>
									</div>
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
						<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
							<label>Isi Berita</label>
							<textarea class="form-control" name="isi" id="isi-berita"></textarea>
							@if($errors->has('isi'))
							<span class="help-block">{{$errors->first('isi')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah Berita</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Berita</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Judul Berita</th>
						<th>Kategori Berita</th>
						<th>Isi Berita</th>
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
<script type="text/javascript">
	$('#frm-kategori').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.post("{{route('admin.postKategoriBerita')}}", data, function(data) {
			toastr.success('Success!', 'Kategori berhasil di tambahkan!');
				$('#select-kategori').append($('<option />', {
						value: data.id,
						text: data.nama,
					}));
			$('#modal-kategori').modal('hide');
		});
	}) 
	$('#datatables').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{route('admin.getDataBerita')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'judul'},
			{data: 'kategori_berita.nama'},
			{data: 'isi'},
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