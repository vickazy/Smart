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
                    <h2>Review Absensi Sekolah</h2>
                    <ul class="menu">
                        <li><a href="{{route('absensi', strtolower(str_slug($nama_jurusan)))}}" class="btn btn-default">Absensi</a></li>
                        <li><a href="{{route('review.absensi', strtolower(str_slug($nama_jurusan)))}}" class="btn btn-default">Review Absensi</a></li>
                        <li><a href="{{route('event', strtolower(str_slug($nama_jurusan)))}}" class="btn btn-default">Event</a></li>
                        <li><a href="{{route('kegiatan', strtolower(str_slug($nama_jurusan)))}}" class="btn btn-default">Kegiatan</a></li>
                        <li><a href="{{route('siswa', strtolower(str_slug($nama_jurusan)))}}" class="btn btn-default">Siswa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->
    <div class="container" style="margin-top: 40px">
        <div class="row">
        	<div class="col-lg-12 col-xs-12">
        		<div class="panel panel-default">
        			<div class="panel-heading">
        				<h3 class="panel-title">Cari berdasarkan tanggal</h3>
        			</div>
        			<div class="panel-body">
        				<form action="{{route('review.absensi', $nama_jurusan)}}" method="get" id="frm-cari">
        				<div class="col-lg-4 col-xs-12">
        					<label>Dari Tanggal</label>
        					<input type="date" name="dari" class="form-control">
        				</div>
        				<div class="col-lg-4 col-xs-12">
        					<label>Sampai Tanggal</label>
        					<input type="date" name="sampai" class="form-control">
        				</div>
        				<div class="col-lg-4 col-xs-12">
        					<button type="submit" class="btn btn-primary btn-block" style="margin-top: 25px">Cari <i class="fa fa-search"></i></button>
        				</div>
        				</form>
        			</div>
        		</div>
        	</div>
            <div class="col-lg-12 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Review Absensi Tahun Ini</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table id="datatables" class="table table-hover table-striped table-bordered tabelku">
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
    </div>

    {{-- modal detail --}}
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Review Absensi Siswa</h4>
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
		$(document).ready(function() {
			$('#datatables').DataTable();
			$('#datatables').on('click', '.btn-detail', function() {
				var siswa_id = $(this).data('id');
				const row = '<tr style="text-align:center">'+
									'<td colspan=4>Loading...</td>'+
							'</tr>';
				$('#absensi').append(row);
				$.get('/jurusan/{{$nama_jurusan}}/review-absensi/'+siswa_id, {siswa_id: siswa_id}, function(data) {
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
		});
	</script>
@endsection