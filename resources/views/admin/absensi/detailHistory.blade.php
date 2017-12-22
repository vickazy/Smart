@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
		<h3><i class="fa fa-angle-right"></i> Detail Absensi</h3>
		<div style="margin-bottom: 10px">
			<a href="{{route('absensi.history')}}" class="btn btn-danger">Kembali</a>
		</div>
		<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
			<div class="table-responsive">
				<table id="datatables" class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Tgl Absensi</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($absensi as $key => $value)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ date('d-F-Y', strtotime($value['created_at'])) }}</td>
								<td>{{$value['keterangan']}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('customJs')
	<script type="text/javascript">
		$('#datatables').DataTable();
	</script>
@endsection