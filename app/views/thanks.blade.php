@extends('layouts.master')

@section('content')
	<div class="row premios">
		<div class="col-md-9">
			<div class="row">
				<div class="col-sm-7">
					<img src="img/img_gracias.png" alt="Gracias por participar" class="img-responsive">
				</div>
				<div class="col-sm-5 prelative mt10">
					<img src="img/bg_video.png" alt="Fondo video" class="img-responsive">
					<div class="bg-video"></div>
				</div>
			</div>
			<div class="mt20 content-home">
				<div class="col-md-4">
					<img src="img/entradas_dobles.png" alt="Entradas dobles al cine">
				</div>
				<div class="col-md-4">
					<img src="img/tablet_advance.png" alt="Tablet Advance">
				</div>
				<div class="col-md-4">
					<img src="img/becas.png" alt="Becas Privatecher Online">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-3">
			<img src="img/img_final.png" alt="Mujer que roche" class="mt20 img-responsive" id="img_compartir">
			<div class="text-center">
				<div class="mb20 mt10">
					<a href="#" class="btn btn-sm btn-black">Premios</a>
					&nbsp;&nbsp;
					<a href="policy" class="btn btn-sm btn-black">Condiciones</a>
				</div>
			</div>
		</div>
	</div>
@endsection