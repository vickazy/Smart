@extends('admin.templates.app')

@section('content')
	<div class="col-lg-12">
    <h3><i class="fa fa-angle-right"></i>Edit Berita</h3>
    <div class="content-panel" style="padding:10px 10px;margin-bottom:100px">
      	<a href="{{route('admin.berita')}}" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		    <form action="{{route('admin.postUpdateBerita', $data['id'])}}" method="post" enctype="multipart/form-data">
		    	{{csrf_field()}}
			    	<div class="col-lg-6">
				    	<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
				    		<label>Judul Berita</label>
				    		<input type="text" name="judul" class="form-control" value="{{$data['judul']}}">
				    		@if($errors->has('judul'))
								<span class="help-block">{{$errors->first('judul')}}</span>
				    		@endif
				    	</div>
			    	</div>
			    	<div class="col-lg-6">
			    		<div class="form-group">
				    		<label>Kategori Berita</label>
				    		<select class="form-control select2" name="kategori_id" style="width: 100% !important">
				    			<option selected disabled>- Kategori Berita -</option>
							    @foreach($kategoriBerita as $kategori)
									<option value="{{$kategori['id']}}" {{ $data['kategori_berita_id'] == $kategori['id'] ? 'selected' : ' ' }}>{{$kategori['nama']}}</option>
							    @endforeach
				    		</select>
				    	</div>
			    	</div>
		    	<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
		    		<label>Upload Gambar</label>
		    		<input type="file" name="photo" class="form-control">
		    		@if($errors->has('photo'))
						<span class="help-block">{{$errors->first('photo')}}</span>
				    @endif
		    	</div>
		    	<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
		    		<label>Isi Berita</label>
		    		<textarea class="form-control" name="isi" id="isi-berita">{{$data['isi']}}</textarea>
		    		@if($errors->has('isi'))
						<span class="help-block">{{$errors->first('isi')}}</span>
				    @endif
		    	</div>

		    	<button type="submit" class="btn btn-warning btn-block">Edit Berita</button>
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