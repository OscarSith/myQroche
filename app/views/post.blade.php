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
						<a href="policy" class="btn btn-sm btn-black">Condiciones</a>
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
							<p data-id="{{ $rec->id }}">{{ str_limit($rec->post, '54', '...') }}</p>
						</div>
						<img src="img/avatars/{{ $rec->genero }}_{{ $rec->genero === 'm' ? rand(1,11) : rand(1,17) }}.jpg" alt="Avatar" class="push-right">
					</li>
				@endforeach
				</ul>
				<div id="postsLinks">
					{{ $posts->links() }}
				</div>
				<div id="inline-alert" class="alert alert-block alert-warning hidden">Cargando Posts...</div>
			@endif
		</div>
	</div>
	<div class="modal fade" id="modal-show-post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Historia de <span></span></h4>
				</div>
				<div class="modal-body">
					<p></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--<script src="{{ asset('node_modules/requirejs/require.js') }}" data-main="post_index"></script>-->
	<script src="js/post.min.js"></script>
@endsection