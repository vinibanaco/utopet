$(document).ready(function () {
	$('#senha, #confirmar-senha').on('keyup', function () {
		if ($('#senha').val() == $('#confirmar-senha').val()) {
			$('.mensagem-senha').html('');
		} else {
			$('.mensagem-senha').html('Senha incorreta').css('color', '#ff0000');
		}
	});
});