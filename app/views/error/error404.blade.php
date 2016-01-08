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
	{{ HTML::style('css/main.css') }}

</head>
<body>
	
	

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


<div class="row" style="margin-top:5%">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div style="text-align:center">
				<h3><strong>Teatinos</strong></h3>
				<br><br>			
				<!-- <a href="http://www.humancoachingnetwork.com/"> -->
					{{-- HTML::image('img/HumanCoachingNetwork.png', 'LOGO HCN', array('height'=>'80')) 
				</a> --}}
			</div>
		</div>
			<div class="col-md-3"></div>
</div>
			<hr>


		<div class="row"  style="margin-left:35%"> 
			<div class="col-md-6">
				<div class="panel panel-default">
						


						<div class="panel-heading"> 

								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>

							 	&nbsp; Error 404, la página solicitada no existe  <hr>
							
							
								<a href="{{URL::to('/')}}"<span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>


								<a href="{{URL::to('/')}}"> &nbsp; &nbsp; &nbsp; Regresar a la página de Inicio</
						</div>
				</div>		
			</div>
				<div class="col-md-3"></div>
		</div>



</body>
</html>
