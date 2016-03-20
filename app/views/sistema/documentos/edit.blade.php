@extends('layouts')
@section('content')

{{ Form::open(array('action'=>'sistema\DocumentosController@postEdit', 'files'=>true)) }}
	{{ Form::hidden('docum_id', $Document->id) }}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				Editar Información {{ $Document->nombre }}
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('nombre', 'Nombre') }}
					{{ Form::text('nombre', $Document->nombre, array('class'=>'form-control onlyLetters', 'required' => true)) }}
				</div>

				<div class="col-md-3">
					{{ Form::label('user_id', 'Autor') }}
					{{ Form::select('user_id', $user_cmb, $Document->usuarios_id, array('class'=>'form-control select2', 'required' => true)) }}
				</div>


			</div>



			<div class="panel-footer">
				<a href="{{ URL::previous() }}" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i> Volver</a>
				<button type="submit" class="btn btn-primary pull-right">Guardar <i class="fa fa-save"></i></button>
				<br><br>
			</div>
		</div>
	</div>
{{ Form::close() }}


@stop