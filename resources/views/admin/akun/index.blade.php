@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Setting Akun Admin </h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:300px">
	<form action="{{route('postAkun')}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="{{$admin['username']}}" required>
			<input type="hidden" name="id" value="{{$admin['id']}}">
		</div>
		<div class="form-group">
			<label>Password Baru</label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
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