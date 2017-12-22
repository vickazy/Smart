@extends('smart.templates.app')
@section('content')
<section class="global-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2>Pengumuman</h2>
					<ol class="breadcrumb">
						<li>
							<a href="index.html">
								<i class="ion-ios-home"></i>
								Home
							</a>
						</li>
						<li class="active">Pengumuman</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	</section><!--/#Page header-->
	<section id="blog-full-width">
		<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
						@foreach($pengumuman as $data)
						<article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
							<div class="blog-post-image">
								@if($data['file'])
								<a href="#!"><img class="img-responsive" src="{{URL::to("upload/pengumuman/". $data['file'])}}" alt="" /></a>
								@endif
							</div>
							<div class="blog-content">
								<h2 class="blogpost-title">
								<a href="#!">{{$data['judul']}}</a>
								</h2>
								<div class="blog-meta">
									<span>{{date('F d, Y', strtotime($data['created_at']))}}</span>
									<span>by <a href="#!">Admin</a></span>
								</div>
								<p>
									{{ substr(strip_tags($data['isi']), 0, 300) }}{{strlen($data['isi']) > 300 ? '...' : ' '}}
								</p>
								<a href="{{route('pengumumanSingle', $data['id'])}}" class="btn btn-dafault btn-details">Baca Selengkapnya</a>
							</div>
						</article>
						@endforeach
						<span class="pull-right">{{ $pengumuman->render() }}</span>
					</div>
				</div>
			</section>
@endsection
