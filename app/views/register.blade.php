@extends('layouts.master')

@section('content')
<?php
$date = new DateTime();
$date->sub(new DateInterval('P7Y'));
?>
	<div class="row">
		{{ Form::model(Session::get('user'), array('route' => 'add', 'method' => 'post', 'id' => 'frm-submit-post')) }}
			<div class="col-md-7">
				<img src="img/img_data.png" alt="Completa tus datos" class="mb20 img-responsive">
				<div class="mt20">
					<div class="col-md-4">
						<img src="img/entradas_dobles.png" alt="Entradas dobles al cine" class="img-responsive">
					</div>
					<div class="col-md-4">
						<img src="img/tablet_advance.png" alt="Tablet Advance" class="img-responsive">
					</div>
					<div class="col-md-4">
						<img src="img/becas.png" alt="Becas Privatecher Online" class="img-responsive">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="text-center prelative content-tooltip">
					<div class="custom-tooltip">
						<div>A un paso de completar tu historia !!!</div>
					</div>
					{{ Form::submit('SIGUIENTE', array('class' => 'btn-next')) }}
					<div class="mb20 mt10">
						<a href="#" class="btn btn-sm btn-black">Premios</a>
						&nbsp;&nbsp;
						<a href="#" class="btn btn-sm btn-black">Condiciones</a>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div id="content-frm" class="mt20">
					<div class="form-group row">
						<div class="col-md-6">
							{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'NOMBRE', 'required')) }}
							@if($errors->has('nombre'))
								<b class="text-danger fs9">{{ $errors->first('nombre') }}</b>
							@endif
						</div>
						<div class="col-md-6">
							{{ Form::text('apellido', null, array('class' => 'form-control', 'placeholder' => 'APELLIDO', 'required')) }}
							@if($errors->has('apellido'))
								<b class="text-danger fs9">{{ $errors->first('apellido') }}</b>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							{{ Form::text('dni', null, array('class' => 'form-control', 'placeholder' => 'DNI', 'required')) }}
							@if($errors->has('dni'))
								<b class="text-danger fs9">{{ $errors->first('dni') }}</b>
							@endif
						</div>
						<div class="col-md-6">
							{{ Form::text('alias', null, array('class' => 'form-control', 'placeholder' => 'ALIAS', 'required')) }}
							@if($errors->has('alias'))
								<b class="text-danger fs9">{{ $errors->first('alias') }}</b>
							@endif
						</div>
					</div>
					<div class="form-group row mb20 mt20">
						<label class="col-md-3">Género</label>
						<label class="col-md-3 wp">
							{{ Form::radio('genero', 'm') }} Masculino
						</label>
						<label class="col-md-3 wp">
							{{ Form::radio('genero', 'f') }} Femenino
						</label>
						@if($errors->has('genero'))
							<div class="col-xs-12">
								<b class="text-danger fs9">{{ $errors->first('genero') }}</b>
							</div>
						@endif
					</div>
					<div class="form-group row">
						{{ Form::label('nacimiento', 'Fecha de nacimiento', array('class' => 'col-md-6 control-label mt12')) }}
						<div class="col-md-6">
							{{ Form::text('nacimiento', $date->format('Y-m-d'), array('class' => 'form-control', 'readonly')) }}
						</div>
						@if($errors->has('nacimiento'))
							<div class="col-xs-12">
								<b class="text-danger fs9">{{ $errors->first('nacimiento') }}</b>
							</div>
						@endif
					</div>
					<div class="form-group">
						{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Correo Electrónico', 'required')) }}
						@if($errors->has('email'))
							@foreach ($errors->get('email') as $message)
								<b class="text-danger fs9">{{ $message }}</b>
							@endforeach
						@endif
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							{{ Form::text('celular', null, array('class' => 'form-control', 'placeholder' => 'Celular', 'required')) }}
							@if($errors->has('celular'))
								<b class="text-danger fs9">{{ $errors->first('celular') }}</b>
							@endif
						</div>
						<div class="col-md-6">
							{{ Form::text('telefono', null, array('class' => 'form-control', 'placeholder' => 'Teléfono')) }}
							@if($errors->has('telefono'))
								<b class="text-danger fs9">{{ $errors->first('telefono') }}</b>
							@endif
						</div>
					</div>
					<label>
						{{ Form::checkbox('terminos') }}
						<b>Acepto haber leido los terminos y condiciones</b>
						@if($errors->has('terminos'))
							<span class="col-xs-12">
								<b class="text-danger fs9">{{ $errors->first('terminos') }}</b>
							</span>
						@endif
					</label>
					@if($errors->has('sql_error'))
						<script>alert("{{ $errors->first('sql_error') }}");</script>
					@endif
				</div>
			</div>
		{{ Form::close() }}
	</div>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/pikaday.js') }}"></script>
	<script>
		new Pikaday({
			field: document.getElementById('nacimiento'),
			showMonthAfterYear: true,
			yearRange: 50,
			i18n: {
				months		  : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
								'Septiembre','Octubre','Noviembre','Diciembre'],
				weekdays	  : ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
				weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sab']
			}
		});
	</script>
@endsection