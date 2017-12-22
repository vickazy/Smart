@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
		<h3><i class="fa fa-angle-right"></i> Edit Pengumuman</h3>
		<span>
			<a href="{{route('admin.pengumuman')}}" class="btn btn-danger">Kembali</a>
		</span>
		<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
			<div class="row" style="margin-top:10px;">
				<div class="col-xs-12">
					<div class="row">
						<form action="{{route('admin.postPengumumanUpdate', $data['id'])}}" method="post" id="frm-tambah" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="col-lg-12">
								<div class="form-group">
									<label>Judul</label>
									<input type="text" name="judul" class="form-control" value="{{$data['judul']}}">
								</div>
								<div class="form-group">
									<label>Upload Gambar</label>
									<input type="file" name="file" class="form-control">
								</div>
								<div class="form-group">
									<label>Isi Pengumuman</label>
									<textarea name="pengumuman">{{$data['isi']}}</textarea>
								</div>

								<button class="btn btn-warning btn-block" type="submit">
									Edit Pengumuman
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('customJs')
	@if (Session::has('success'))
		<script type="text/javascript">
			$(document).ready(function() {
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
			});
		</script>
	@endif
@endsection