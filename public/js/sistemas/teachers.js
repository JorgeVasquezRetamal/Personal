$(function(){
	// $('input[name=certificator]').change(function(){
	// 	if($(this).prop('checked')){
	// 		$('#files_certifying').fadeIn();
	// 		$('#file_logo').attr('required', true);
	// 		$('#file_signature').attr('required', true);
	// 	}
	// 	else{
	// 		$('#files_certifying').fadeOut();
	// 		$('#file_logo').removeAttr('required');
	// 		$('#file_signature').removeAttr('required');
	// 	}
	// });	
	$('#type').change(function(){
		if($(this).val() == 'Certificador'){
			$('#files_certifying').fadeIn();
			$('#file_logo').attr('required', true);
			$('#file_signature').attr('required', true);
		}
		else{
			$('#files_certifying').fadeOut();
			$('#file_logo').removeAttr('required');
			$('#file_signature').removeAttr('required');
		}
	});
});