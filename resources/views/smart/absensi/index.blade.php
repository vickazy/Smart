@extends('smart.templates.app')
@section('customCss')
<style type="text/css">
    .menu li {
        display: inline-block;
        padding: 5px;
    }
</style>
@endsection
@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Absensi Sekolah</h2>
                    <ul class="menu">
                        <li><a href="{{route('absensi', strtolower(str_slug($nama)))}}" class="btn btn-default">Absensi</a></li>
                        <li><a href="{{route('event', strtolower(str_slug($nama)))}}" class="btn btn-default">Event</a></li>
                        <li><a href="{{route('kegiatan', strtolower(str_slug($nama)))}}" class="btn btn-default">Kegiatan</a></li>
                        <li><a href="{{route('siswa', strtolower(str_slug($nama)))}}" class="btn btn-default">Siswa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <div class="container" style="margin-top: 40px">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Absensi</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table id="datatables" class="table table-hover table-striped table-bordered tabelku">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Absen</th>
										<th>Actions</th>
									</tr>
								</thead>
							</table>
						</div>
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
    				<h4 class="modal-title">Daftar Absensi Jurusan {{$nama}}</h4>
    			</div>
    			<div class="modal-body">
					<div class="table-responsive">
						<table id="datatables2" class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Siswa</th>
									<th>Kelas</th>
									<th>Nisn</th>
									<th>Keterangan</th>
								</tr>
							</thead>
						</table>
					</div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    			</div>
    		</div>
    	</div>
    </div>
@endsection

@section('customJs')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#datatables').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{route('getDataAbsensi', $nama_jurusan)}}',
				columns: [
					{data: 'DT_Row_Index', orderable: false, searchable: false},
					{data: 'tgl'},
					{data: 'action'},
				]
			});

			$('#datatables').on('click', '.btn-detail', function() {
				const tgl = $(this).data('tgl');

				$('#datatables2').DataTable({
					processing: true,
					serverSide: true,
					destroy: true,
					ajax: "/jurusan/{{$nama_jurusan}}/"+tgl+"/getAbsensiDetail",
					columns: [
						{data: 'DT_Row_Index', orderable: false, searchable: false},
						{data: 'nama'},
						{data: 'kelas'},
						{data: 'nisn'},
						{data: 'keterangan'},
					]
				});
			})
		});
	</script>
@endsection