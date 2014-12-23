@extends('layouts.master')

@section('content')
	<div class="row">
		<h4 class="text-center">Cuentanos todito y exagera XD !!!</h4>
		<div class="col-md-9">
			{{ Form::open(array('route' => 'addpost', 'method' => 'put', 'id' => 'frm-submit-post')) }}
			<div class="row">
				<div class="col-md-4">
					<img src="img/img_post.png" alt="img texto">
				</div>
				<div class="col-md-8" id="content-post">
					<div class="col-md-11">
						{{ Form::textarea('post', null, array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="text-center">
					{{ Form::submit('FINAL', array('class' => 'btn-begin')) }}
				</div>
			</div>
			{{ Form::close() }}
		</div>
		<div class="col-md-3">
			<img src="img/title_header_posts.png" alt="">
		</div>
	</div>
@endsection