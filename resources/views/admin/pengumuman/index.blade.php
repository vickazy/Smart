@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
		<h3><i class="fa fa-angle-right"></i> Pengumuman</h3>
		<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
			<div>
				<a href="#tambah" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Pengumuman</a>
			</div>
			<div class="collapse" id="tambah">
			  <div class="well">
			  	<div class="row">
					<form action="{{route('admin.postPengumuman')}}" method="post" id="frm-tambah" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="col-lg-12">
							<div class="form-group">
								<label>Judul</label>
								<input type="text" name="judul" class="form-control">
							</div>
							<div class="form-group">
								<label>Upload Gambar</label>
								<input type="file" name="file" class="form-control">
							</div>
							<div class="form-group">
								<label>Isi Pengumuman</label>
								<textarea name="pengumuman"></textarea>
							</div>

							<button class="btn btn-primary btn-block" type="submit">
								Tambah Pengumuman
							</button>
						</div>
					</form>
				</div>
			  </div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-xs-12">
					<h3>Daftar Absensi</h3>
					<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
						<thead>
							<th>No</th>
							<th>Judul</th>
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
			ajax: '{{route('admin.getDataPengumuman')}}',
			columns: [
				{data: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'judul'},
				{data: 'action'},
			]
		});

		$('#datatables').on('click', '.delete', function() {
			const id = $(this).data('id');
			$.confirm({
				icon: 'fa fa-warning',
				title: 'Alert !',
				content: 'Apakah anda ingin menghapus data ini ?',
				type: 'red',
				typeAnimated: true,
				buttons: {
				confirm: function () {
				$.get("{{ route('admin.getPengumumanDelete') }}", {id: id}, function (data) {
					$('#datatables').DataTable().ajax.reload();
					toastr.success('Success', 'Data berhasil di hapus!', {timeOut: 5000});
				});
				},
				cancel: function () {

				},
				}
			});
		})
	</script>
	@if (Session::has('success'))
		<script type="text/javascript">
			$(document).ready(function() {
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
			});
		</script>
	@endif
@endsection