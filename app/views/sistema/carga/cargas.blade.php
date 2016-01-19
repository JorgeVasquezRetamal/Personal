@extends('layouts')
@section('content')


{{ Form::open(array('action'=>'sistema\Import2Controller@postActionimportar2', 'files'=>true)) }}
 
  <div class="panel panel-default">
    	<div class="panel-heading">
  	    <h3 class="panel-title">
          Cargar Importación
        </h3>
    	</div>
    	<div class="panel-body">
        {{ Form::label('file', 'Adjuntar Archivo') }} 
        {{ Form::file('file') }}  {{ $errors->first() }} {{ Session::get('mensaje') }}

    	</div>
      <div class="panel-footer">
          <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
          <button type="submit" class="btn btn-primary pull-right">Subir Datos <i class="fa fa-save"></i></button>        
      </div>
  </div>
{{ Form::close() }}

@stop

