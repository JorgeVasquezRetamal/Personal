@extends('layouts')
@section('content')

 <p class="lead">Bienvenido : {{ Auth::user()->nombre  }}
 {{ ' -  '}}  {{ 'Usuario'}}  {{ '  :  '}} {{ Auth::user()->usuario  }}  
 {{ ' -  '}}  {{ 'Pais'}}  {{ '  :  '}} {{ Auth::user()->pais->nombre  }}
 {{ ' -  '}}  {{ 'Ciudad'}}  {{ '  :  '}} {{ Auth::user()->ciudad->nombre  }}    

<hr>
	{{ 'Usuarios Activos'}}  {{ '  :  '}}
	{{ User::whereEstado('Activo')->count()}}

	{{ '   ...     '}}
	{{ 'Paises Activos'}}  {{ '  :  '}}
	{{ Auth::user()->pais->whereEstado('Activo')->count() }} 


	{{ '    ...    '}}
	{{ 'Ciudades Activas'}}  {{ '  :  '}}
	{{ Auth::user()->ciudad->whereEstado('Activo')->count() }} 

<hr>
<div class="panel panel-default">
  	<div class="panel-heading">
	    <h3 class="panel-title">
	    	Usuarios
	    </h3>
  	</div>

<div class="panel-body">
	{{ Form::open(array('method'=>'GET')) }}
	<div class="row">
		<div class="col-md-2">
			{{ Form::label('name_id', 'Nombres') }}
			{{ Form::select('name_id', $user_cmb, Input::get('name_id'), array('class'=>'form-control select2 ')) }}
		</div>

		<div class="col-md-2">
			{{ Form::label('pais_id', 'Pais') }}
			{{ Form::select('pais_id', $pais_cmb, Input::get('pais_id'), array('class'=>'form-control select2 ')) }}
		</div>

		<div class="col-md-2">
			{{ Form::label('ciudad_id', 'Ciudad') }}
			{{ Form::select('ciudad_id', $ciudad_cmb, Input::get('ciudad_id'), array('class'=>'form-control select2 ')) }}
		</div>

		<div class="col-md-2">
			{{ Form::label('usuario_id', 'Usuario') }}
			{{ Form::text('usuario_id', '', array('class'=>'form-control', 'placeholder'=>'Usuario a consultar')) }}
		</div>

		<div class="col-md-2">
			{{ Form::label('usuario_id2', 'Usuario LIKE') }}
			{{ Form::text('usuario_id2', '', array('class'=>'form-control', 'placeholder'=>'LIKE a consultar')) }}
		</div>


		<div class="col-md-2">
			{{ Form::label('nombre_id2', 'Nombre LIKE') }}
			{{ Form::text('nombre_id2', '', array('class'=>'form-control', 'placeholder'=>'LIKE a consultar')) }}
		</div>

	</div>

	<br>
	<button type="submit" class="btn btn-large btn-primary" >Buscar <i class="fa fa-search"></i>
	</button>
</div>

{{ Form::close() }}

<hr>
<table class="table data_table">
	<thead>	  		
		<tr>
			<th>Nombres</th>
			<th>País</th>
			<th>Ciudad</th>
			<th>Estado</th>
		</tr>
	</thead>
	<tbody>
	@foreach($usuarios as $user)
		<tr>
			<td>{{ $user->nombre }}</td>
			<td>{{ ($user->pais) ? $user->pais->nombre : '' }}</td>
			<td>{{ ($user->ciudad) ? $user->ciudad->nombre : '' }}</td>
			<td>{{ $user->estado }}</td>
		</tr>
	@endforeach
</table>



@stop


