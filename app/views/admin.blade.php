@extends('layouts')
@section('content')

   

<div class="tabbable">
    <ul class="nav nav-tabs">
      <li><a href="#inicio" data-toggle="tab"><i class="icon-th-large"></i>Inicio</a></li>
      <li class="active"><a href="#usuario" data-toggle="tab"><i class="icon-comment"></i>Usuario</a></li>

    </ul>
    <!-- Inicio contenido -->
    <div class="tab-content">

    	<!-- Inicio primer tab -->
    	<div class="tab-pane" id="inicio">
    		<div class="row-fluid">

    			<p class="lead">Bienvenido : {{ Auth::user()->nombre  }}
    				{{ ' -  '}}  {{ 'Usuario'}}  {{ '  :  '}} {{ Auth::user()->usuario  }}  
    				{{ ' -  '}}  {{ 'Pais'}}  {{ '  :  '}} {{ Auth::user()->pais->nombre  }}
    				{{ ' -  '}}  {{ 'Ciudad'}}  {{ '  :  '}} {{ Auth::user()->ciudad->nombre  }} </p>


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

    		</div>

    	</div>
    	<!-- Fin primer tab -->

    	<!-- Inicio segundo tab -->
    	<div class="tab-pane active" id="usuario">
    		<div class="row-fluid">
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

    		</div>

    	</div>
    	<!-- Fin segundo tab -->


    </div>
    <!-- Termino contenido -->


 </div>








