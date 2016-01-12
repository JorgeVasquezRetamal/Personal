$(function(){
	$('.payment').on('click', function(){
		var enrolled_id = $(this).data('enrolled');
		$('#enrolled_id').val(enrolled_id);
	});
});