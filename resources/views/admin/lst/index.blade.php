@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<h3><i class="fa fa-angle-right"></i> LSP1 Sekolah</h3>
	<div class="content-panel" style="padding:10px 10px;margin-bottom:200px">
		<div>
			<a href="#tambah-adiwiyata" data-toggle="collapse" class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah LSP1</a>
			<div class="collapse" id="tambah-adiwiyata" style="margin-top:5px;margin-bottom: 50px">
				<div class="well">
					<form action="{{route('admin.postLst')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group{{$errors->has('judul') ? ' has-error' : ' '}}">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control">
							@if($errors->has('judul'))
							<span class="help-block">{{$errors->first('judul')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('photo') ? ' has-error' : ' '}}">
							<label>Upload Gambar/Video <small>(max: 20mb)</small></label>
							<input type="file" name="file" class="form-control">
							@if($errors->has('photo'))
							<span class="help-block">{{$errors->first('photo')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('isi') ? ' has-error' : ' '}}">
							<label>Isi Lst</label>
							<textarea class="form-control" name="isi" id="isi-adiwiyata"></textarea>
							@if($errors->has('isi'))
							<span class="help-block">{{$errors->first('isi')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Tambah LSP1</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-xs-12">
				<h3>Daftar LSP1</h3>
				<table id="datatables" class="table table-striped table-bordered">
					<thead>
						<th>No</th>
						<th>Photo / Video</th>
						<th>Judul</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($lst as $key => $value)
							<tr>
								<td>{{++$key}}</td>
								<td>
									@if($value['type_file'] == 'photo')
										<img src="{{URL::to('upload/lst/'.$value['file'])}}" width="200px">
									@elseif($value['type_file'] == 'video')
										<video width="200px" controls="">
                                          <source src="{{URL::to('upload/lst/'.$value['file'])}}">
                                        </video>
                                    @else
                                    	<p>file tidak ada</p>
									@endif
								</td>
								<td>
									{{$value['judul']}}
								</td>
								<td>
									<a href="{{route('admin.editLst', $value['id'])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
									<a href="#!" class="btn btn-danger btn-delete" data-id="{{$value['id']}}"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('customJs')
	<script type="text/javascript">
		$('#datatables').on('click', '.btn-delete', function() {
			const id = $(this).data('id');
			$.confirm({
					icon: 'fa fa-warning',
					title: 'Alert !',
					content: 'Apakah anda ingin menghapus data ini ?',
					type: 'red',
					typeAnimated: true,
					buttons: {
					confirm: function () {
					$.get("{{ route('admin.deleteLst') }}", {id: id}, function (data) {
						location.reload();
					});
					},
					cancel: function () {

					},
					}
				});
			})
	</script>

	@if (Session::has('success'))
		<script type="text/javascript">
			$(document).ready(function() {
					toastr.success('Success', '{{Session::get('success')}}', {timeOut: 5000});
			});
		</script>
	@endif
@endsection