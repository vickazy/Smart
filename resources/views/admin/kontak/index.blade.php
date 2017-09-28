@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Kontak</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<div class="" id="tambah" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postKontak')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group{{$errors->has('alamat') ? ' has-error' : ' '}}">
							<label>Alamat</label>
							<input type="text" name="alamat" class="form-control" value="{{$data['alamat']}}">
							@if($errors->has('alamat'))
								<span class="help-block">{{$errors->first('alamat')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('email') ? ' has-error' : ' '}}">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="{{$data['email']}}">
							@if($errors->has('email'))
								<span class="help-block">{{$errors->first('email')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('no_telpon') ? ' has-error' : ' '}}">
							<label>No. Telpon</label>
							<input type="text" name="no_telpon" class="form-control" value="{{$data['no_telpon']}}">
							@if($errors->has('no_telpon'))
								<span class="help-block">{{$errors->first('no_telpon')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Simpan</button>
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