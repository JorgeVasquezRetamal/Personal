$(function(){
	if(jQuery().datetimepicker){
		$('.txtDate').datetimepicker({
			timepicker: false,
			format:'d/m/Y',
			scrollInput: false,
		});
	}

	if(jQuery().select2){
		$('.select2').select2({
			formatNoMatches: 'No se han encontrado coincidencias',
		});
	}

	$(".editor").jqte({
		format: false, 
		fsize: false,
		color: false,
		i: false,
		ol: false,
		ul: false,
		sub: false,
		sup: false,
		outdent: false,
		indent: false,
		// right: false,
		// center: false,
		// left: false,
		strike: false,
		link: false,
		unlink: false,
		remove: false,
		rule: false,
		source: false
	});




	$('.data_table').DataTable({
			"paging": true,
	        "info": false,
			"language" : 
			{                
				"emptyTable":     "No hay datos para esta tabla",
				"info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ filas",
				"infoEmpty":      "Mostrando 0 de 0 filas",
				"infoFiltered":   "(filtradas de _MAX_ filas totales)",
				"infoPostFix":    "",
				"thousands":      ",",
				"lengthMenu":     "Mostrar _MENU_ filas",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search":         "Filtro:",
				"zeroRecords":    "No hay registros que cumplan con el filtro",                
				"paginate": 
				{
				    "first":      "Primera",
				    "last":       "Ultima",
				    "next":       "Siguiente",
				    "previous":   "Anterior"
				},
					"aria": 
					{
					    "sortAscending":  ": Click para ordenar ascendentemente",
					    "sortDescending": ": Click para ordenar descendentemente"
					}
			}
	,	});


	$('.onlyNumbers').keypress(function(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		// if($(this).val().length > 10) return false;
		if ((keynum == 8) || (keynum == 46)) return true;
		return /\d/.test(String.fromCharCode(keynum));
	});

	$('.onlyLetters').keypress(function(e) {
		if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
		event.returnValue = false;
	});


	$('#country_id').change(function(){		
		var idc = $(this).val();
		if(idc == '') idc = 0;
		//$('#param_name_courses_id').val('');
		$('#param_name_courses_id').select2('val','');
		
		//$('#param_name_courses_id').html('<option value="">--Cargando--</option>');

		//select = document.getElementById('city_id');
		select = document.getElementById('param_name_courses_id');
		


		if(idc > 0){
			$('#nic').attr('disabled', false);
			$('#nic').val('');
			if(select){
				for (var i = select.options.length - 1; i >= 0; i--) {
					select.options[i].remove();
				};

				//$.get(HOME+'/cities/cities/'+idc, function(data){
				//$.get(HOME+'/courses/students/'+idc, function(data){
				//            clase   funcion
				$.get(HOME+'/courses/courses/'+idc, function(data){
					if(data!=''){
						$('<option value="">--Todos--</option>').appendTo($('#param_name_courses_id'));
						for (var i = 0; i<data.length; i++) {
							$('<option value="'+data[i].id+'">'+data[i].name+'</option>').appendTo($('#param_name_courses_id'));
						};
					}else{
						console.log('fail');
						$('#param_name_courses_id').html('<option value="">--Todos--</option>');
					}
				}, 'json')
			}



			$.get(HOME+'/countries/code/'+idc, function(data){
				if(data!=''){
					$('#span_calling_code').text(data);
					$('#span_calling_code2').text(data);
					$('#calling_code').attr('value',data);
					$('#calling_code2').attr('value',data);
					//console.log(data);
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

	$('#param_name_courses_id').change(function(){
		var idc = '';
		$("#param_name_courses_id option").each(function(){
			if($(this).is(':selected') == true){
				console.log($(this).attr('data-country'));	
				idc = $(this).attr('data-country');	
			} 
		});
		$('#country_id').val(idc);		
		// var idc = $(this).attr('data-country');
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

	$(window).bind('scroll', function(){return false;});

	// $('.txtDateModule').datetimepicker({
	// 	timepicker: false,
	// 	format:'d/m/Y',
	// 	scrollInput: false,
	// 	onShow:function( ct ){
	// 		this.setOptions({
	// 			maxDate: $('#end_date').val() ? $('#end_date').val() : false
	// 		})
	// 	}
	// });
});