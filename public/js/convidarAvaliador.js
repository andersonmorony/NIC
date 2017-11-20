$(document).ready(function(){
	$('.btn-convidar').click(function(){
		var valor = $(this).data('id');
		$('#id_usuario').val(valor);
	})
});