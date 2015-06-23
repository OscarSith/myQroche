@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-8 content-home">
			<h1>
				¿Has pasado algún roche
				<small>por no saber inglés?</small>
			</h1>
			<img src="img/img_txt_tell_us.png" alt="img texto" style="margin-top: 40px;margin-bottom:30px">
			<div class="mt20">
				<div class="col-md-4">
					<img src="img/entradas_dobles.png" alt="Entradas dobles al cine">
				</div>
				<div class="col-md-4">
					<img src="img/tablet_advance.png" alt="Tablet Advance">
				</div>
				<div class="col-md-4">
					<img src="img/becas.png" alt="Becas Privatecher Online" style="width:205px">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-4">
			<img src="img/img_qroche_home.png" alt="Mujer que roche" class="mt20 center-block" id="img_qroche_home">
			<div class="text-center">
				<a href="register" class="btn-begin">INICIA TU HISTORIA</a>
				<div class="mb20 mt10">
					<a href="#" class="btn btn-sm btn-black">Premios</a>
					&nbsp;&nbsp;
					<a href="policy" class="btn btn-sm btn-black">Condiciones</a>
				</div>
			</div>
		</div>
	</div>
@endsection