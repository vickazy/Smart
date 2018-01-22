@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Review Absensi Siswa</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:400px">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<form action="{{ route('absensi.reviewPost') }}" method="post">
					{{csrf_field()}}
					<div class="col-lg-6 col-xs-12">
						<div class="form-group">
							<label>Dari Tanggal</label>
							<input type="date" name="tgl1" class="form-control">
						</div>
					</div>
					<div class="col-lg-6 col-xs-12">
						<div class="form-group">
							<label>Sampai Tanggal</label>
							<input type="date" name="tgl2" class="form-control">
						</div>
					</div>
					<div class="col-lg-8 col-xs-12 col-lg-offset-2">
						<button type="submit" class="btn btn-block btn-primary">Cari</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
{{-- <script type="text/javascript">
	$('.datepicker').datepicker();
</script> --}}
@endsection