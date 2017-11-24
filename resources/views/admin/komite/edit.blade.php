@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i>Edit Komite</h3>
    <div class="content-panel" style="padding:10px 10px;margin-bottom:250px">
      	<a href="{{route('admin.komite')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		    <form action="{{route('admin.postUpdateKomite', $data['id'])}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('nama') ? ' has-error' : ' '}}">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" value="{{$data['nama']}}">
									@if($errors->has('nama'))
									<span class="help-block">{{$errors->first('nama')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('bidang') ? ' has-error' : ' '}}">
									<label>Menjabat Sebagai ?</label>
									<input type="text" name="bidang" class="form-control" value="{{$data['bidang']}}">
									@if($errors->has('bidang'))
									<span class="help-block">{{$errors->first('bidang')}}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
							<label>Upload Gambar</label>
							<input type="file" name="photo" class="form-control">
							@if($errors->has('photo'))
							<span class="help-block">{{$errors->first('photo')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-warning btn-block">Edit Komite</button>
					</form>
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