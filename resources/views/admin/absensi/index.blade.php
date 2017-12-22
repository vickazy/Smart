@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Absensi Jurusan {{ $nama_jurusan }}</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#modal-tambah" data-toggle="modal" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Absensi</a>
			<a href="#modal-import" data-toggle="modal" class="btn btn-flat btn-success"><i class="fa fa-file-excel-o"></i> Import Absensi</a>
			<a href="{{route('absensi.getDeleteAbsensiAll')}}" id="deleteAbsensiAll" data-jurusan_id="{{$jurusan_id}}" class="btn btn-danger">Hapus Semua Absensi <i class="fa fa-exclamation-triangle"></i></a>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar Absensi</h3>
				<table id="datatables" class="table table-striped table-bordered" style="text-align:center">
					<thead>
						<th>No</th>
						<th>Tanggal Absensi</th>
						<th>Action</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
{{-- modal tambah --}}
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Absensi Jurusan {{ $nama_jurusan }}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-8 col-xs-12 col-lg-offset-2">
						<div class="input-group">
							<select class="form-control select2 select-siswa" style="width: 100% !important">
								<option disabled selected="">-Cari Siswa-</option>
								@foreach($siswa as $data)
									<option value="{{$data['id']}}"
									data-id="{{$data['id']}}" data-nama="{{$data['nama']}}" data-jk="{{$data['jenis_kelamin']}}"
									>{{$data['nama']}} &nbsp; - {{$data['kelas']}}</option>
								@endforeach
							</select>
							<div class="input-group-addon"><i class="fa fa-search"></i></div>
						</div>
					</div>
				</div>
				<br>
				<br>
					<form method="post" id="frm-absensi">
				<div class="table-responsive">
					<table id="" class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Jenis Kelamin</th>
								<th>Keterangan</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody id="daftar-absensi">
						</tbody>
					</table>
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
{{-- modal import --}}
<div class="modal fade" id="modal-import">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Import Absensi</h4>
			</div>
			<div class="modal-body">
					<form action="{{route('absensi.importAbsensi')}}" enctype="multipart/form-data" method="post">
						{{csrf_field()}}
						<div class="form-group text-center">
							<label for="">Upload File Excel</label>
							<input type="file" name="import_file" id="import_file" class="form-control">
						</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Upload File</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	var table = $('#datatables').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{route('absensi.getDataAbsensi')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'tgl'},
			{data: 'action'},
		]
	});
$('#datatables').on('click','.delete', function(e) {
		var tgl = $(this).data('tgl');
		var jurusan_id = $(this).data('jurusan_id');
		$.confirm({
			icon: 'fa fa-warning',
			title: 'Alert !',
			content: 'Apakah anda ingin menghapus data ini ?',
			type: 'red',
			typeAnimated: true,
			buttons: {
			confirm: function () {
			$.get("{{ route('absensi.getDeleteAbsensi') }}", {tgl: tgl, jurusan_id: jurusan_id}, function (data) {
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
					$('#datatables').DataTable().ajax.reload();
			});
			},
			cancel: function () {
			},
			}
		});
	});

	$('#deleteAbsensiAll').on('click', function(e) {
		e.preventDefault();
		var jurusan_id = $(this).data('jurusan_id');
		$.confirm({
			icon: 'fa fa-warning',
			title: 'Alert !',
			content: 'Apakah anda ingin menghapus semua data absensi ?',
			type: 'red',
			typeAnimated: true,
			buttons: {
			confirm: function () {
			$.get("{{ route('absensi.getDeleteAbsensiAll') }}", {jurusan_id:jurusan_id}, function (data) {
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
					$('#datatables').DataTable().ajax.reload();
			});
			},
			cancel: function () {
			},
			}
		});
	})

	// tambah absensi
	$('.select-siswa').on('change', function() {
		$('.select-siswa option:selected').each(function() {
			const id = $(this).data('id');
			const nama = $(this).data('nama');
			var jk = $(this).data('jk');
			if (jk == 'pria') {
				jk = 'pria'
			}else{
				jk = 'wanita'
			}
			const data = 	"<tr>"+
							"<td>"+nama+"<input type='hidden' name='siswa_id[]' value='"+id+"' /></td>"+
							"<td>"+jk+"</td>"+
							"<td><select class='form-control' name='keterangan[]' required>"+
							"<option value='alpha'>Alpha</option>"+
							"<option value='sakit'>Sakit</option>"+
							"<option value='ijin'>Ijin</option>"+
							"<option value='terlambat'>Terlambat</option>"+
							"</select></td>"+
							"<td><a href='#!delete' class='btn btn-danger btn-delete'> <i class='fa fa-trash'></i> </a></td>"
						 	"</tr>";

			$('#daftar-absensi').append(data);

			$('.btn-delete').on('click', function() {
				$(this).closest('tr').remove();
				return false;
			});
		});
	});

	$('#frm-absensi').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		$.post("{{route('admin.postAbsensi')}}", data, function(data) {
			if (true) {
				toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
				$('#datatables').DataTable().ajax.reload();
				$('#modal-tambah').modal('hide');
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