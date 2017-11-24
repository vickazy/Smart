@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i>Edit Event</h3>
    <div class="content-panel" style="padding:10px 10px;margin-bottom:100px">
      	<a href="{{route('admin.event')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		    <form action="{{route('admin.postUpdateEvent', $data['id'])}}" method="post" enctype="multipart/form-data">
		    	{{csrf_field()}}
			    	<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
									<label>Judul Event</label>
									<input type="text" name="judul" class="form-control" value="{{$data['judul']}}">
									@if($errors->has('judul'))
									<span class="help-block">{{$errors->first('judul')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Kategori Event</label>
										<select class="form-control select2" id="select-kategori" name="kategori_event_id" style="width: 100% !important">
											<option selected disabled>- Kategori Event -</option>
											@foreach($kategoriEvent as $kategori)
											<option value="{{$kategori['id']}}" {{$kategori['id'] == $data['kategori_event_id'] ? 'selected' : " "}}>{{$kategori['nama']}}</option>
											@endforeach
										</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('tgl_event') ? ' has-error' : ' '}}">
									<label>Tanggal Event</label>
									<input type="date" name="tgl_event" class="form-control" value="{{$data['tgl_event']}}">
									@if($errors->has('tgl_event'))
									<span class="help-block">{{$errors->first('tgl_event')}}</span>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group{{$errors->has('tempat') ? ' has-error' : ' '}}">
									<label>Tempat Event</label>
									<input type="text" name="tempat" class="form-control" value="{{$data['tempat']}}">
									@if($errors->has('tempat'))
									<span class="help-block">{{$errors->first('tempat')}}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Upload Foto</label>
							<input type="file" name="photo" id="" class="form-control">
						</div>
						<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
							<label>Isi Event</label>
							<textarea class="form-control" name="isi" id="isi-berita">{{$data['isi']}}</textarea>
							@if($errors->has('isi'))
							<span class="help-block">{{$errors->first('isi')}}</span>
							@endif
						</div>

		    	<button type="submit" class="btn btn-warning btn-block">Edit Event</button>
		    </form>
    </div>
  </div>
@endsection

@section('customJs')
	<script type="text/javascript" src="{{URL::to('node_modules/ckeditor/ckeditor.js')}}"></script>
	@if (Session::has('success'))
		<script type="text/javascript">
			$(document).ready(function() {
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
			});
		</script>
	@endif
@endsection