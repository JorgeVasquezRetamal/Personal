@extends('layouts')
@section('content')


{{ Form::open(array('action'=>'sistema\OtrosController@getActionExcel')) }}

<div class="panel panel-default">
 <div class="panel-heading">
   <h3 class="panel-title">
    Descarga Información
  </h3>

</div>

<div class="panel-default">
Usuarios					
</div>


<div class="row">

	<div class="col-md-2">

		<a href="{{ action('sistema\OtrosController@getActionExcel') }}" class="btn btn-xs btn-default pull-top">Excel<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span></a>


		<a href="{{ action('sistema\OtrosController@getActionTXT') }}" class="btn btn-xs btn-default pull-top">TXT<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span></a>
	</div>


	<div class="col-md-2">

		<a href="{{ action('sistema\OtrosController@getActionTXT2') }}" class="btn btn-xs btn-default pull-top">TXT ;<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span></a>

								<a href="#">
							{{ HTML::image('img/excel_icon.png') }}
							<p>Descargar Reporte</p>
						</a>
	</div>

</div>

					

<div class="panel-footer">
  <a href="{{ URL::previous() }}" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Volver</a>

</div>

     
</div>
{{ Form::close() }}

@stop