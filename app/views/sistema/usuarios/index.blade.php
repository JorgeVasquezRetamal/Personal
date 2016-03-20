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
<a href="{{ action('sistema\OtrosController@getActionExcel') }}" class="btn btn-xs btn-default pull-top"> Usuarios en Base<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span></a>
{{-- <i class="fa fa-plus"></i> --}}

<hr>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="{{ action('sistema\UsersController@getCreate') }}" class="btn btn-xs btn-default pull-right">Nuevo Administrador <i class="fa fa-plus"></i></a>


			<ul id="statusTab" class="nav nav-pills" role="tablist">
				<li class="active"><a href="#activos" role="tab" data-toggle="tab">Administradores Activos</a></li>
				<li><a href="#inactivos" role="tab" data-toggle="tab">Administradores Inactivos</a></li>
			</ul>
		</h3>   
	</div>
	<div class="panel-body">
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="activos">
			<table class="table data_table">
				<thead>	  		
					<tr>
						<th>Nombres</th>
						<th>País</th>
						<th>Ciudad</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>


					@foreach($users_act as $user_act)
					<tr>
						<td>{{ $user_act->nombre }}</td>

						<td>{{ ($user_act->pais) ? $user_act->pais->nombre : '' }}</td>
						<td>{{ ($user_act->ciudad) ? $user_act->ciudad->nombre : '' }}</td>

						<td>{{ $user_act->estado }}</td>

						<td>
							<a href="{{ action('sistema\UsersController@getEdit', array($user_act->id)) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</a>
							<a href="{{ action('sistema\UsersController@getVer', array($user_act->id)) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Ver</a>
							@if($user_act->estado=='Activo')
							<a href="{{ action('sistema\UsersController@getDesactive', array($user_act->id)) }}" class="btn btn-xs btn-warning"><i class="fa fa-times"></i> Desactivar</a>
							@else
							<a href="{{ action('sistema\UsersController@getActive', array($user_act->id)) }}" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Activar</a>
							@endif
						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="tab-pane" id="inactivos">
			<table class="table data_table">
				<thead>
					<tr>
						<th>Nombres</th>
						<th>País</th>
						<th>Ciudad</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users_inact as $user_inact)
					<tr>
						<td>{{ $user_inact->nombre }}</td>

						<td>{{ ($user_inact->pais) ? $user_inact->pais->nombre : '' }}</td>
						<td>{{ ($user_inact->ciudad) ? $user_inact->ciudad->nombre : '' }}</td>

						<td>{{ $user_inact->estado }}</td>
						<td>
							<a href="{{ action('sistema\UsersController@getEdit', array($user_inact->id)) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Editar</a>
							<a href="{{ action('sistema\UsersController@getVer', array($user_inact->id)) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Ver</a>
							@if($user_inact->estado=='Activo')
							<a href="{{ action('sistema\UsersController@getDesactive', array($user_inact->id)) }}" class="btn btn-xs btn-warning"><i class="fa fa-times"></i> Desactivar</a>
							@else
							<a href="{{ action('sistema\UsersController@getActive', array($user_inact->id)) }}" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Activar</a>
							@endif
						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


</div>
  	

@stop


