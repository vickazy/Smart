@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
		<h3><i class="fa fa-angle-right"></i> History Absensi Siswa</h3>
		<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
			<div class="table-responsive">
				<table id="datatables" class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Siswa</th>
							<th>Kelas</th>
							<th>Detail</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('customJs')
	<script type="text/javascript">
		$('#datatables').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('absensi.getDataHistory')}}',
			columns: [
				{data: 'DT_Row_Index', orderable: false, searchable: false},
				{data: 'nama'},
				{data: 'kelas'},
				{data: 'action'},
			]
		});
	</script>
@endsection