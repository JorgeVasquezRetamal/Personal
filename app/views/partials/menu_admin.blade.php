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
			Diplomas <span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		
	</ul>
</li>

<li><a href="{{ action('sistema\HomeController@getLogout') }}">Salir</a></li>

