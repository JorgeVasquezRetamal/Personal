$(function(){
	$('.matriculate').each(function(){
		$(this).on('click', function(e){
			var id_course = $(this).data('course');
			$('#course_id').val(id_course);
		});
	});

	$('.approval').on('click', function(e){
		var id_course = $(this).data('course');
		$('#approval_course_id').val(id_course);
	});

	$('.request').on('click', function(e){
		var enrolled_id = $(this).data('student');
		$('#enrolled_id').val(enrolled_id);
	});

	$('#requestmultiple').on('click', function(){
		console.log('click');
		var count = 0; 

		$(".enrolleds_id").remove();
		$('.enrolled').each(function(){
			if($(this).is(':checked')){
				count += 1;
				$('<input type="hidden" class="enrolleds_id" name="enrolleds[]" value="'+$(this).val()+'">').prependTo('#BodyRequestMultiple');
			}

		});

		console.log('multiple : '+count);

		if(count>0){
			// $('#ammount').val( $('#value').val() * count );
			$('#ammount_multiple').val( $('#value').val() * count );
			$('#ammount_multiple_view').val( $('#value').val() * count );
		}
	})

	$('.addStudent').click(function(e){
		e.preventDefault();
		idc = $(this).attr('data-course');
		select = document.getElementById("student_enrolled_id");

		// console.log(select.options.length);

		for (var i = select.options.length - 1; i >= 0; i--) {
			select.options[i].remove();
		};

		$.get(HOME+'/courses/students/'+idc, function(data){
			if(data!=''){
				for (var i = 0; i<data.length; i++) {
					$('<option value="'+data[i].id+'">'+data[i].name+'</option>').appendTo($('#student_enrolled_id'));
				};
			}else{
				$('#student_enrolled_id').html('<option value="">No existen Estudiantes disponibles</option>');
			}
		}, 'json')

	});

	$('input[name=enrolled_all]').change(function(){
		if($(this).is(':checked')){
			// console.log('si');
			$('.enrolled').each(function(){
				if(!$(this).is(':checked')){
					$(this).prop('checked', true);
					$('#requestmultiple').fadeIn();
				}
			});
		}
		else{
			// console.log('no');
			$('.enrolled').each(function(){
				if($(this).is(':checked')){
					$(this).prop('checked', false);
					$('#requestmultiple').fadeOut();
				}
			});
		}	
	});

	$('.show-module').on('click', function(){
		for (var i = 1; i <= 8 ; i++) {
			module = 'module_'+i;
			if ($('#'+module).is(':hidden')){
		   		$('#'+module).show();
		   		break
		    } 
		};	
	});

	$('.hide-module').on('click', function(){
		for (var i = 8; i > 0 ; i--) {
			module = 'module_'+i;
			module_start = 'module_'+i+'_start_date';
			module_end = 'module_'+i+'_end_date';
			if (!$('#'+module).is(':hidden')){
		   		$('#'+module).hide();
		   		$('#'+module_start).val('');
		   		$('#'+module_end).val('');
		   		break
		    } 
		};	
	});

	$('input[name=enrolled_id]').change(function(){
		var count = 0;
		$('.enrolled').each(function(){
			if($(this).is(':checked')){
				count += 1;
			}
		});
		// console.log(count);
		if(count>0) $('#requestmultiple').fadeIn();
		else $('#requestmultiple').fadeOut();
	})

});