<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pagina de Login</title>
	<meta name="description" content="">
	<meta name="author" content="Prueba - Chile">
	
	<link rel="shortcut icon" href="{{ URL::asset('img/carita.png') }}"> 
	{{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('assets/bootstrap/css/bootstrap-theme.min.css') }}
	{{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
	{{ HTML::style('assets/vitalets-bootstrap-datepicker/css/datepicker.css') }}

	{{ HTML::style('assets/datetimepicker/jquery.datetimepicker.css') }}

	{{ HTML::style('assets/datatables/css/jquery.dataTables.css') }}
	{{ HTML::style('assets/datatables/css/dataTables.bootstrap.css') }}
	{{ HTML::style('assets/chosen/chosen.css') }}
	{{-- HTML::style('css/main.css') --}}
	

</head>
<body>
	<div class="row" style="margin-top:5%">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div style="text-align:center">
				<h3><strong>Teatinos</strong></h3>
				<br><br>			
				
			</div>
			<hr>
			
	<!-- Formulario ingreso al sistema  -->

			{{ Form::open(array('action'=>'sistema\HomeController@postLogin')) }}
			
				<div class="panel panel-default">
					<div class="panel-heading">Ingresar al Sistema</div>
					<div class="panel-body">
					
						<div class="row"> 
							<div class="col-md-5">
								{{ Form::label('user', 'Usuario') }} 
								
							</div>
							<div class="col-md-7">
								{{ Form::label('password', 'Contraseña') }} 
								
							</div>
						</div>

						<div class="row"> 
							<div class="col-md-5">
								 
								{{ Form::text('user', '' , array('class'=>'form-control')) }} 
							</div>
							<div class="col-md-7">
								
								{{ Form::password('password' , array('class'=>'form-control')) }}  
							</div>
						</div>

						
					</div>
					<div class="panel-footer btn-form">
						<button class="btn btn-primary btn-lg" type="submit">Ingresar <i class="fa fa-sign-in"></i></button>
					</div>
				</div>
			{{ Form::close() }} 

		</div>
		<div class="col-md-3"></div>
	</div>
	
	{{ HTML::script('assets/jquery-1.11.0.min.js') }}
	{{ HTML::script('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js') }}
	{{ HTML::script('assets/fullcalendar/fullcalendar.min.js') }}
	{{ HTML::script('assets/vitalets-bootstrap-datepicker/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/vitalets-bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js') }}

	{{ HTML::script('assets/datetimepicker/jquery.datetimepicker.js') }}

	{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('assets/datatables/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/datatables/js/dataTables.bootstrap.js') }}
	{{ HTML::script('assets/chosen/chosen.jquery.min.js') }}
	{{ HTML::script('assets/jquery.numeric.js') }}

	

	<script>
		var HOME = '{{ URL::to('') }}';
	</script>
	<script>
		@yield('scripts')
	</script>


</body>
</html>