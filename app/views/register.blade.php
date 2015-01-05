@extends('layouts.master')

@section('content')
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
						</div>
						<div class="col-md-6">
							{{ Form::text('apellido', null, array('class' => 'form-control', 'placeholder' => 'APELLIDO', 'required')) }}
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							{{ Form::text('dni', null, array('class' => 'form-control', 'placeholder' => 'DNI', 'required')) }}
						</div>
						<div class="col-md-6">
							{{ Form::text('alias', null, array('class' => 'form-control', 'placeholder' => 'ALIAS', 'required')) }}
						</div>
					</div>
					<div class="form-group row mb20 mt20">
						<label class="col-md-3">Género</label>
						<label class="col-md-3">
							{{ Form::radio('genero', 'M') }} Masculino
						</label>
						<label class="col-md-3">
							{{ Form::radio('genero', 'F') }} Femenino
						</label>
					</div>
					<div class="form-group row">
						{{ Form::label('nacimiento', 'Fecha de nacimiento', array('class' => 'col-md-6 control-label')) }}
						<div class="col-md-6">
							{{ Form::text('nacimiento', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Correo Electrónico', 'required')) }}
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							{{ Form::text('telefono', null, array('class' => 'form-control', 'placeholder' => 'Teléfono', 'required')) }}
						</div>
						<div class="col-md-6">
							{{ Form::text('celular', null, array('class' => 'form-control', 'placeholder' => 'Celular', 'required')) }}
						</div>
					</div>
					<label>
						{{ Form::checkbox('terminos') }}
						<b>Acepto haber leido los terminos y condiciones</b>
					</label>
					@foreach($errors->all('<div>:message</div>') as $message)
						{{ $message }}
					@endforeach
				</div>
			</div>
		{{ Form::close() }}
	</div>
@endsection