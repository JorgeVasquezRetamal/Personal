$(function(){
	$('#all_students').on('click', function(){
		if($(this).is(':checked')){
			$('#students').attr('disabled', 'disabled');
			$("#students").select2("val", "");
		}else{
			$('#students').removeAttr('disabled');
		}
	});

	$('#all_coordinates').on('click', function(){
		console.log('si');
		if($(this).is(':checked')){
			$('#coordinates').attr('disabled', 'disabled');
			$("#coordinates").select2("val", "");
		}else{
			$('#coordinates').removeAttr('disabled');
		}
	});

	$('.send-catalog').click(function(){
		// console.log('click!');
		idc = $(this).attr('data-catalog');
		console.log(idc);
		$('#catalog_id').attr('value',idc);
	});
});