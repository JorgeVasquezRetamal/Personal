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
        {{ Form::file('file') }}  
        
        @if(Session::has('mensaje') or $errors->first())
          <div class="alert alert-danger">
            {{ Session::get('mensaje') }}
            {{ $errors->first() }}
          </div>
        @endif

        @if(Session::has('mensaje2'))
          <div class="alert alert-success">
            {{ Session::get('mensaje2') }}
          </div>
        @endif


    	</div>
      <div class="panel-footer">
          <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>
          <button type="submit" class="btn btn-primary pull-right">Subir Datos <i class="fa fa-save"></i></button>        
      </div>
  </div>
{{ Form::close() }}

@stop

