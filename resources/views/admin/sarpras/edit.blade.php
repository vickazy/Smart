@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i>Edit Sarpras</h3>
    <div class="content-panel" style="padding:10px 10px;margin-bottom:100px">
      	<a href="{{route('admin.sarpras')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		    <form action="{{route('admin.postUpdateSarpras', $data['id'])}}" method="post" enctype="multipart/form-data">
		    	{{csrf_field()}}
				    	<div class="form-group{{$errors->has('nama') ? ' has-error' : ' '}}">
				    		<label>Nama Sarpras</label>
				    		<input type="text" name="nama" class="form-control" value="{{$data['nama']}}">
				    		@if($errors->has('nama'))
								<span class="help-block">{{$errors->first('nama')}}</span>
				    		@endif
				    	</div>
		    	<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
		    		<label>Upload Gambar</label>
		    		<input type="file" name="photo" class="form-control">
		    		@if($errors->has('photo'))
						<span class="help-block">{{$errors->first('photo')}}</span>
				    @endif
		    	</div>
		    	<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
		    		<label>Keterangan Sarpras</label>
		    		<textarea class="form-control" name="isi" id="isi-berita">{{$data['isi']}}</textarea>
		    		@if($errors->has('isi'))
						<span class="help-block">{{$errors->first('isi')}}</span>
				    @endif
		    	</div>

		    	<button type="submit" class="btn btn-warning btn-block">Edit Sarpras</button>
		    </form>
    </div>
  </div>
@endsection

@section('customJs')
	<script type="text/javascript" src="{{URL::to('node_modules/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript">
	    CKEDITOR.replace('isi-berita');
	</script>
	@if (Session::has('success'))
		<script type="text/javascript">
			$(document).ready(function() {
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
			});
		</script>
	@endif
@endsection