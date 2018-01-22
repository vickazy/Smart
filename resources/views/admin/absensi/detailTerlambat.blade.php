@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
		<h3><i class="fa fa-angle-right"></i> Absensi Jurusan {{ $nama_jurusan }}</h3>
		<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
			<div class="row">
				<div class="col-xs-12">
					<span><a href="{{route('absensi.index')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></span>
					<h3 class="text-center">Absensi {{ $tgl }}</h3>
					<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
						<thead>
							<th>No</th>
							<th>Nama Siswa</th>
							<th>Kelas</th>
							<th>Jenis Kelamin</th>
							<th>Nisn</th>
							<th>Keterangan</th>
							<th>Action</th>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>

	{{-- modal edit --}}
	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Absensi</h4>
				</div>
				<div class="modal-body">
					<form id="frm-edit" method="post">
						<div class="form-group">
							<label>Nama Siswa</label>
							<input type="hidden" name="id_absensi" id="id_absensi">
							<input type="text" readonly="" id="nama_siswa" class="form-control" name="nama_siswa">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<select class="form-control" id="keterangan" name="keterangan">
								<option value='alpha'>Alpha</option>
								<option value='sakit'>Sakit</option>
								<option value='ijin'>Ijin</option>
								<option value='terlambat'>Terlambat</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
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
			ajax: '{{route('absensi.getDataAbsensiDetailTerlambat', $tgl)}}',
			columns: [
				{data: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'nama'},
				{data: 'kelas'},
				{data: 'jenis_kelamin'},
				{data: 'nisn'},
				{data: 'keterangan'},
				{data: 'action'},
			]
		});

		$('#datatables').on('click', '.btn-edit', function() {
			const id_absensi = $(this).data('id');
			const nama = $(this).data('nama');
			const keterangan = $(this).data('keterangan');
			// ===
			$('#modal-edit').find('#id_absensi').val(id_absensi);
			$('#modal-edit').find('#nama_siswa').val(nama);
			$('#modal-edit').find('#keterangan').val(keterangan);
		});

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
				$.get("{{ route('absensi.getDeleteAbsensiSiswa', $tgl) }}", {id:id}, function (data) {
					console.log(data);
						toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
						$('#datatables').DataTable().ajax.reload();
				});
				},
				cancel: function () {
				},
				}
			});
		})

		$('#modal-edit').on('submit', '#frm-edit' ,function(e) {
			e.preventDefault();
			const absensi = $(this).serialize();
			// console.log(absensi);
			$.post("{{route('absensi.postAbsensiUpdate', $tgl)}}", absensi, function(data) {
				if (true) {
					console.log(data);
					$('#datatables').DataTable().ajax.reload();
					$('#modal-edit').modal('hide');
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
				}
			})
		})
	</script>
@endsection