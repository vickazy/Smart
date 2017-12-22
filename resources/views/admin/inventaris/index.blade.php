@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
		<h3><i class="fa fa-angle-right"></i> Inventaris Sekolah</h3>
		<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
			<div>
				<a href="#tambah" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Inventaris</a>
			</div>
			{{-- Tambah Inventaris --}}
			<div class="collapse" id="tambah">
			  <div class="well">
			    <form id="frm-tambah" method="post">
			    	<div class="row">
				    	<div class="col-lg-6">
				    		<div class="form-group">
					    		<label>Nama</label>
					    		<input type="text" name="nama" class="form-control">
					    	</div>
				    	</div>
				    	<div class="col-lg-6">
					    	<div class="form-group">
					    		<label>No. Registrasi</label>
					    		<input type="text" name="no_registrasi" class="form-control">
					    	</div>
					    </div>
					    <div class="col-lg-6">
					    	<div class="form-group">
					    		<label>Jumlah</label>
					    		<input type="number" name="jumlah" class="form-control">
					    	</div>
					    </div>
					    <div class="col-lg-6">
					    	<div class="form-group">
					    		<label>Tempat</label>
					    		<input type="text" name="tempat" class="form-control">
					    	</div>
					    </div>

					    <div class="col-lg-12">
					    	<button class="btn btn-block btn-primary" type="submit"><i class="fa fa-plus"></i> Tambah Inventaris</button>
					    </div>
				    </div>
			    </form>
			  </div>
			</div>

			{{-- table --}}
			<div class="table-responsive" style="margin-top: 30px">
				<table id="datatables" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>No. Registrasi</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	{{-- Modal edit --}}
	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Data</h4>
				</div>
				<div class="modal-body">
					<form id="frm-edit" method="post">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" id="nama" name="nama" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>No. Registrasi</label>
									<input type="text" id="no_registrasi" name="no_registrasi" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Jumlah</label>
									<input type="number" id="jumlah" name="jumlah" class="form-control">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tempat</label>
									<input type="text" id="tempat" name="tempat" class="form-control">
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-warning">Update</button>
					</form>
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
			ajax: '{{route('admin.getDataInventaris')}}',
			columns: [
				{data: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'nama'},
				{data: 'no_registrasi'},
				{data: 'action'},
			]
		});

		$('#frm-tambah').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post("{{route('admin.postInventaris')}}", data, function(data) {
				toastr.success('Success', 'Data berhasil di tambah', {timeOut: 5000});
				$('#datatables').DataTable().ajax.reload();
				$('#frm-tambah')[0].reset();
			})
		})

		$('#datatables').on('click', '.btn-edit', function() {
			const nama = $(this).data('nama');
			const no_registrasi = $(this).data('no_registrasi');
			const jumlah = $(this).data('jumlah');
			const tempat = $(this).data('tempat');

			var edit = $('#frm-edit');
			edit.find('#nama').val(nama);
			edit.find('#no_registrasi').val(no_registrasi);
			edit.find('#jumlah').val(jumlah);
			edit.find('#tempat').val(tempat);
		})

		$('#datatables').on('click', '.btn-delete', function() {
			const id = $(this).data('id');
			$.confirm({
				icon: 'fa fa-warning',
				title: 'Alert !',
				content: 'Apakah anda ingin menghapus data ini ?',
				type: 'red',
				typeAnimated: true,
				buttons: {
				confirm: function () {
				$.get("{{ route('admin.getInventarisDelete') }}", {id: id}, function (data) {
						toastr.success('Success', 'Data berhasil di hapus !', {timeOut: 5000});
						$('#datatables').DataTable().ajax.reload();
				});
				},
				cancel: function () {
				},
				}
			});
		})
		$('#frm-edit').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post("{{route('admin.postInventarisUpdate')}}", data, function(data) {
				toastr.success('Success', 'Data berhasil di update', {timeOut: 5000});
				$('#datatables').DataTable().ajax.reload();
				$('#modal-edit').modal('hide');
			})
		})
	</script>
@endsection