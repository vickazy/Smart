@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Review Absensi Siswa</h3>
	<div style="margin-bottom: 20px">
		<a href="{{route('absensi.review')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
	</div>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:400px">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="table-responsive">
					<table id="datatables" class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Siswa</th>
								<th>Kelas</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>
							@foreach($siswa as $key => $value)
							<tr>
								<td>{{++$key}}</td>
								<td>{{$value['nama']}}</td>
								<td>{{$value['kelas']}}</td>
								<td>
									<a href="#modal-detail" data-backdrop="static" data-keyboard="false" data-toggle="modal" class="btn btn-block btn-primary btn-detail" data-id="{{$value['id']}}">Detail <i class="fa fa-eye"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- modal detail --}}
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Review Absensi</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Alpha</th>
								<th>Ijin</th>
								<th>Sakit</th>
								<th>Terlambat</th>
							</tr>
						</thead>
						<tbody id="absensi">

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="btn-close" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$("#datatables").DataTable();
	$('#datatables').on('click', '.btn-detail', function() {
		var siswa_id = $(this).data('id');
		const row = '<tr style="text-align:center">'+
							'<td colspan=4>Loading...</td>'+
					'</tr>';
		$('#absensi').append(row);
		$.get('/admin/absensi/review/detail/'+siswa_id, {siswa_id: siswa_id}, function(data) {
			$('#absensi').empty();
			const row = '<tr>'+
							'<td>'+data.alpha+'</td>'+
							'<td>'+data.ijin+'</td>'+
							'<td>'+data.sakit+'</td>'+
							'<td>'+data.terlambat+'</td>'+
						'</tr>';
			$('#absensi').append(row);
		});
	});
	$('#btn-close').on('click', function() {
		$('#absensi').empty();
	})
</script>
@endsection