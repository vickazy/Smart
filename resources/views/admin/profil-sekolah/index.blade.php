@extends('admin.templates.app')
@section('content')
<div class="col-lg-12">
	<h3><i class="fa fa-angle-right"></i> Profil Sekolah</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<div class="" id="tambah" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postProfilSekolah')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('nama') ? ' has-error' : ' '}}">
									<label>Nama Kepala Sekolah</label>
									<input type="text" name="nama" class="form-control" value="{{$data['nama']}}">
									<input type="hidden" name="id" value="{{$data['id']}}">
									@if($errors->has('nama'))
									<span class="help-block">{{$errors->first('nama')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('quote') ? ' has-error' : ' '}}">
									<label>Quote Kepala Sekolah</label>
									<input type="text" name="quote" class="form-control" value="{{$data['quote']}}">
									@if($errors->has('quote'))
									<span class="help-block">{{$errors->first('quote')}}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
							<label>Upload Gambar Kepala Sekolah</label>
							<input type="file" name="photo" class="form-control">
							@if($errors->has('photo'))
							<span class="help-block">{{$errors->first('photo')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('visi') ? ' has-error' : ' '}}">
							<label>Visi</label>
							<textarea class="form-control" name="visi" id="visi">{{ $data['visi'] }}</textarea>
							@if($errors->has('visi'))
							<span class="help-block">{{$errors->first('visi')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('misi') ? ' has-error' : ' '}}">
							<label>Misi</label>
							<textarea class="form-control" name="misi" id="misi">{{ $data['misi'] }}</textarea>
							@if($errors->has('misi'))
							<span class="help-block">{{$errors->first('misi')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Simpan Profil Sekolah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript" src="{{URL::to('node_modules/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
		CKEDITOR.replace('visi');
		CKEDITOR.replace('misi');
</script>
@if (Session::has('success'))
<script type="text/javascript">
	$(document).ready(function() {
			toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
	});
</script>
@endif
@endsection