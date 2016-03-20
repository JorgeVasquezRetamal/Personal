@extends('layouts')
@section('content')

{{ Form::open(array('action'=>'sistema\DocumentosController@postCreate', 'files'=>true)) }}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			Nueva Información
		</h3>
	</div>
	<div class="panel-body">
		{{--Inicio primer Div --}}
		<div class="row">
			<div class="col-md-6">
				{{ Form::label('nombre', 'Nombre') }}
				{{ Form::text('nombre', '', array('class'=>'form-control', 'placeholder'=>'Ingrese su Nombre', 'required' => true)) }}
			</div>
			<div class="col-md-4">
				{{ Form::label('user_id', 'Autor') }}
				{{ Form::select('user_id', $user_cmb, '', array('class'=>'form-control select2', 'required' => true)) }}
			</div>
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