$(function(){
	$('#rut').Rut({
	  on_error: function(){ 
	  	$(this).val(''); 
	  	alert('Rut incorrecto. Por favor intentelo nuevamente');
	  }
	});

	$('#country_id').change(function(){		
		var idc = $(this).val();
		if(idc == '') idc = 0;
		select = document.getElementById('city_id');

		if(idc > 0){
			$('#nic').attr('disabled', false);
			$('#nic').val('');
			if(select){
				for (var i = select.options.length - 1; i >= 0; i--) {
					select.options[i].remove();
				};

				$.get(HOME+'/cities/cities/'+idc, function(data){
					if(data!=''){
						$('<option value="">--Seleccione una ciudad--</option>').appendTo($('#city_id'));
						for (var i = 0; i<data.length; i++) {
							$('<option value="'+data[i].id+'">'+data[i].name+'</option>').appendTo($('#city_id'));
						};
					}else{
						console.log('fail');
						$('#city_id').html('<option value="">--No existen ciudades--</option>');
					}
				}, 'json')
			}

			$.get(HOME+'/countries/code/'+idc, function(data){
				if(data!=''){
					$('#span_calling_code').text(data);
					$('#span_calling_code2').text(data);
					$('#calling_code').attr('value',data);
					$('#calling_code2').attr('value',data);
					console.log(data);
					if(data == 56){
						$('#div_rut').show();
						$('#rut').attr('required', true);
						$('#div_nic').hide();
						$('#nic').val('');
						$('#nic').removeAttr('required');
					}else{
						$('#div_nic').show();
						$('#nic').attr('required', true);
						$('#div_rut').hide();
						$('#rut').val('');
						$('#rut').removeAttr('required');
					}
				}
			}, 'json')

		}else{
			$('#span_calling_code').text('');
			$('#span_calling_code2').text('');
			$('#calling_code').attr('value','');
			$('#calling_code2').attr('value','');
			
		}

	});

});