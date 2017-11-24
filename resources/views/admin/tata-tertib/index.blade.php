@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Tata Tertib</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<div class="" id="tambah" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postTataTertib')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
							<label><h3>Isi Tata Tertib</h3></label>
							<textarea class="form-control" name="isi" id="isi">{{ $data['isi'] }}</textarea>
							<input type="hidden" name="id" value="{{$data['id']}}">
							@if($errors->has('isi'))
							<span class="help-block">{{$errors->first('isi')}}</span>
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