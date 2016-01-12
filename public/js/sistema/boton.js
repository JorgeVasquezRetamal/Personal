$(function(){
	$('#rut').Rut({
	  on_error: function(){ 
	  	$(this).val(''); 
	  	alert('Rut incorrecto. Por favor intentelo nuevamente');
	  }
	});