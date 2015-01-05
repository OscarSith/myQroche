@extends('layouts.master')

@section('content')
	<div class="row">
		<h3 class="text-center title-post">Cuentanos todito y exagera XD !!!</h3>
		<div class="col-md-9">
			{{ Form::open(array('route' => 'addpost', 'method' => 'put', 'id' => 'frm-submit-post')) }}
			<div class="row">
				<div class="col-md-4">
					<img src="img/img_post.png" alt="img texto" class="img-responsive">
				</div>
				<div class="col-md-8" id="content-post">
					<div class="col-md-11">
						{{ Form::textarea('post', null, array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="text-center">
					{{ Form::submit('FINAL', array('class' => 'btn-begin')) }}
					<div class="mb20 mt10">
						<a href="#" class="btn btn-sm btn-black">Premios</a>
						&nbsp;&nbsp;
						<a href="#" class="btn btn-sm btn-black">Condiciones</a>
					</div>
				</div>
			</div>
			{{ Form::close() }}
		</div>
		<div class="col-md-3">
			<img src="img/title_header_posts.png" alt="Titulo de los posts echos" class="img-responsive">
			@if(!$posts->isEmpty())
				<ul id="posts" class="row list-unstyled">
				@foreach($posts as $rec)
					<li class="text-right">
						<div class="post-content">
							<b><small>{{ $rec->alias}}</small></b>
							<p>{{ str_limit($rec->post, '54', '...') }}</p>
						</div>
						<img src="#" alt="" class="push-right">
					</li>
				@endforeach
				</ul>
			@endif
		</div>
	</div>
@endsection