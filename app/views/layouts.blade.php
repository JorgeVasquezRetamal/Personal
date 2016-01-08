 <!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pagina Prueba</title>
	<meta name="description" content="">
	<meta name="author" content="Prueba - Chile">
	
	<link rel="shortcut icon" href="{{ URL::asset('img/carita.png') }}"> 
	{{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('assets/bootstrap/css/bootstrap-theme.min.css') }}
	{{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
	{{ HTML::style('assets/datetimepicker/jquery.datetimepicker.css') }}
	{{ HTML::style('assets/datatables/css/jquery.dataTables.css') }}
	
	{{ HTML::style('assets/datatables/dataTables.bootstrap.css') }}
	{{ HTML::style('assets/select2/select2.css') }}
	{{ HTML::style('assets/select2/select2-bootstrap.css') }}
	{{ HTML::style('assets/jquery-te/jquery-te-1.4.0.css') }}
	{{-- HTML::style('css/main.css') --}}
	{{ Asset::styles() }}
</head>
<body >
	<header class="well">
		<div class="row">
			<div class="col-md-3 brand">
				<a href="http://www.humancoachingnetwork.com/" target="_blank">
					{{-- HTML::image('img/HumanCoachingNetwork.png', 'LOGO HCN', array('height'=>'80')) --}}
				</a> 
			</div>
			<div class="col-md-7">
				<br><br>
				<ul class="nav nav-pills pull-right">
				  	@if(Auth::user()->perfil=='root')
				  		@include('partials.menu_admin')
				  {{--	@else
				  		@include('partials.menu_coordinate')--}}
				  	@endif 
				</ul>
			</div>
		</div>
	</header>
	<div class="container">
		@yield('content')
	</div>

	{{ HTML::script('assets/jquery-1.11.0.min.js') }}
	{{ HTML::script('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js') }}
	{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('assets/fullcalendar/fullcalendar.min.js') }}
	{{ HTML::script('assets/select2/select2.min.js') }}
	<script src="http://code.highcharts.com/highcharts.js"></script>
	{{ HTML::script('assets/datetimepicker/jquery.datetimepicker.js') }}
	
	{{ HTML::script('assets/datatables/jquery.dataTables.min.js') }}
	
	{{ HTML::script('assets/datatables/dataTables.bootstrap.js') }}
	{{ HTML::script('assets/jquery-te/jquery-te-1.4.0.min.js') }}
	{{ HTML::script('assets/jquery.numeric.js') }}
	{{ HTML::script('js/diplomas/main.js') }}

	{{-- HTML::script('js/diplomas/app.js') --}}

	{{ HTML::script('assets/jquery.Rut.min.js') }}

	 
	<script>
		var HOME = '{{ URL::to('') }}';
	</script>
	<script>
		@yield('scripts')
	</script>
	{{ Asset::scripts() }}


</body>
</html>