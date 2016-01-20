@extends('layouts')
@section('content')

{{ Form::open(array('action'=>'sistema\UsersController@postCreate', 'files'=>true)) }}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			Nuevo Administrador
		</h3>
	</div>
	<div class="panel-body">
		{{--Inicio primer Div --}}
		<div class="row">
			<div class="col-md-6">
				{{ Form::label('nombre', 'Nombre') }}
				{{ Form::text('nombre', '', array('class'=>'form-control', 'placeholder'=>'Ingrese su Nombre', 'required' => true)) }}
			</div>
			<div class="col-md-3">
				{{ Form::label('usuario', 'Usuario') }}
				{{ Form::text('usuario', '', array('class'=>'form-control', 'placeholder'=>'Ingrese su Usuario', 'required' => true)) }}
			</div>
			<div class="col-md-3">
				{{ Form::label('password', 'Contraseña') }}
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Ingrese su Contraseña','required' => true)) }}
			</div>
		</div>
	{{--Termino primer Div --}}
	<hr>
{{--Inicio segundo Div --}}
	<div class="row">
	<div class="col-md-6">
			{{ Form::label('direccion', 'Dirección') }}
			{{ Form::text('direccion', '', array('class'=>'form-control', 'placeholder'=>'Ingrese su Dirección','required' => true)) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('pais_id', 'País') }}
			{{ Form::select('pais_id', $pais_cmb, '', array('class'=>'form-control', 'required' => true)) }}
		</div>
		<div class="col-md-3">
			{{ Form::label('ciudad_id', 'Ciudad') }}
			{{ Form::select('ciudad_id', $ciudad_cmb, '', array('class'=>'form-control')) }}
		</div>
	</div>
{{--Termino segundo Div --}}
<hr>

		<div class="row">
			<div class="col-md-4">
				{{ Form::label('fnacimiento','Fecha de nacimiento') }}<br>
				{{ Form::text('fnacimiento', '', array('class'=>'txtDate' , 'placeholder'=>'Ingrese Fecha','required' => true)) }}
			</div>
		</div>
				
</div>

			<div class="panel-footer">
				<a href="{{ URL::previous() }}" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i> Volver</a>
				<button type="submit" class="btn btn-primary pull-right">Guardar <i class="fa fa-save"></i></button>
				<br><br>
			</div>

{{ Form::close() }}


@stop