$(function(){
	$('.approved').on('click', function(){
		var request_id = $(this).data('request');
		$('#request_id').val(request_id);
	});

	$('.rejected').on('click', function(){
		var request_id = $(this).data('request');
		$('#request_id_reject').val(request_id);
	});
});