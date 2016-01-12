@extends('layouts')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        Visualizar Usuario: <strong> {{ $user->nombre }} </strong>
      </h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          {{ Form::label('nombre', 'Nombre') }}
          <p class="help-block">{{ $user->nombre }}</p>
        </div>
      </div>
          <div class="row">  
            <div class="col-md-3">
              {{ Form::label('pais_id', 'País') }}
              <p class="help-block">{{ $pais_cmb }}</p>
            </div>
            <div class="col-md-3">
              {{ Form::label('ciudad_id', 'Ciudad') }}
              <p class="help-block">{{ $ciudad_cmb }}</p>
            </div>
            <div class="col-md-6">
              {{ Form::label('direccion', 'Dirección') }}
              <p class="help-block">{{ $user->direccion }}</p>
            </div>
          </div>

         <div class="row">  
            <div class="col-md-3">
              {{ Form::label('perfil', 'Perfil') }}
              <p class="help-block">{{ $user->perfil }}</p>
            </div>
            <div class="col-md-3">
              {{ Form::label('estado', 'Estado') }}
              <p class="help-block">{{ $user->estado }}</p>
            </div>  
            
        </div>

    </div>
    <div class="panel-footer">
      <a href="{{ URL::previous() }}" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i> Volver</a>
      <br><br>
    </div>
</div>


@stop