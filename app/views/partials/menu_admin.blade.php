<li><a href="{{ action('sistema\HomeController@getAdmin') }}">Inicio</a></li>
<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		Administración <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><a href="{{ action('sistema\UsersController@getIndex') }}">Administradores</a></li>
		<li class="divider"></li>
		
	</ul>
</li>
<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		Consultas <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><a href="{{ action('sistema\OtrosController@getActionEdit') }}">Descarga Datos</a></li>
		<li class="divider"></li> 
		
	</ul>


</li>


<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		Cargas <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><a href="{{ action('sistema\Import2Controller@getActionEdit') }}">Cargar Excel</a></li>
		<li><a href="{{ action('sistema\Import2Controller@getActionEdit2') }}">Cargar TXT</a></li>
		<li><a href="{{ action('sistema\Import2Controller@getActionEdittefbech') }}">Cargar TEF BECH</a></li>
		<li class="divider"></li> 
		
	</ul>
</li>

<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		Otros <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><a href="{{ action('sistema\VistaController@getIndex') }}">Otros</a></li>
		<li class="divider"></li> 
		
	</ul>
</li>

<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		Documentos <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li><a href="{{ action('sistema\DocumentosController@getIndex') }}">Documentos</a></li>

		<li class="divider"></li> 
		
	</ul>
</li>



<li><a href="{{ action('sistema\HomeController@getLogout') }}">Salir</a></li>

