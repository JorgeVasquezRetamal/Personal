@extends('layouts')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="{{ action('sistema\DocumentosController@getCreate') }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Agregar Documento </a>

		</h3>   
	</div>
	
	@if(Session::has('mensaje'))
	<div class="alert alert-success">
		{{ Session::get('mensaje') }}
	</div>
	@endif

	<div class="panel-body">
	</div>
	<!-- primero -->
	<div class="tab-content">
		<table class="table data_table">
			<thead>	  		
				<tr>
					<th>Nombre Documento</th>
					<th>Nombre Autor</th>
					<th>Acciones</th>

				</tr>
			</thead>

			<tbody>


				@foreach($Document as $Docum)
				
				<tr>
					<td>{{ $Docum->nombre }}</td>
					<td>{{ ($Docum->usuario) ? $Docum->usuario->nombre : '' }}</td>
					<td>
						<a href="{{ action('sistema\DocumentosController@getEdit', array($Docum->id)) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</a>
						<a href="{{ action('sistema\DocumentosController@getEliminar', array($Docum->id)) }}" class="btn btn-xs btn-danger"><i class="fa fa-eraser"></i> Eliminar</a>
					</td>


				</tr>
				@endforeach
			</tbody>

		</table>
	</div>


	<!-- primero -->
	<div class="tab-content">
		<table class="table data_table">
			<thead>	  		
				<tr>
					<th>Nombre Autor</th>
					<th>Nombre Documento</th>
					
					<th>Acciones</th>

				</tr>
			</thead>

			<tbody>


				@foreach($Users as $user)

				
				<tr>
					
					<td>{{ $user->usuario->nombre }}</td>
					<td>{{ $user->nombre }}</td>
					
					

					
					
					
					<td>
						<a href="{{ action('sistema\DocumentosController@getEdit', array($Docum->id)) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</a>
						<a href="{{ action('sistema\DocumentosController@getEliminar', array($Docum->id)) }}" class="btn btn-xs btn-danger"><i class="fa fa-eraser"></i> Eliminar</a>
					</td>


				</tr>
				@endforeach
			</tbody>

		</table>
	</div>

</div>

  
@stop


