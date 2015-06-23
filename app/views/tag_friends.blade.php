@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12 text-center">
			<p class="hidden">Esta es la descripción que irá en la imagen que saldrá en Facebook</p>
			<img src="img/obten_mas_opciones.png" alt="Texto del titulo">
			<img src="img/img_tag_title.png" alt="Subtitulo de etiquetado de amigos">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="text-left col-sm-6">
					<div id="fb-select-friends"></div>
					<div class="form-group">
						<textarea id="message" cols="30" rows="10" class="form-control hidden" placeholder="Escriba aquí su mensaje..."></textarea>
					</div>
					<div class="alert alert-warning alert-dismissible hidden" id="alert">
						<button type="button" class="close">
							<span aria-hidden="true">&times;</span>
						</button>
						<span></span>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<a href="#" id="fb-login-app" class="btn-begin">INVITAR</a>
				<div class="text-center">
					<a href="{{ url('thanks') }}" class="btn" id="btn-saltar-paso">Saltar paso</a>
				</div>
				<div class="mb20 mt10">
					<a href="#" class="btn btn-sm btn-black">Premios</a>
					&nbsp;&nbsp;
					<a href="policy" class="btn btn-sm btn-black">Condiciones</a>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.min.js') }}"></script>
@endsection