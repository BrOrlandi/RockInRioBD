

$('#cadastrar_usuario').submit(function(event) {
	event.preventDefault();
	
	var $form = $(this);
	
	var email = $('#email').val();
	if(!validateEmail(email)){
		$('#error').removeClass('invisible');
		$('#error').html("<p>E-mail não está em um formato válido.</p>");
		return false;
	}
	
	var senha = $('#senha').val();
	var csenha = $('#confsenha').val();
	if(senha != csenha){
		$('#error').removeClass('invisible');
		$('#error').html("<p>Senha não foi confirmada corretamente.</p>");
		return false;
	}
	
	$('#error').addClass('invisible');
	
	$.ajax({
		type: $form.attr('method'),
		url: $form.attr('action'),
		data: $form.serialize(),
		success: function(data,status){
			if(data != null){
				$('#error').removeClass('invisible');
				$('#error').html("<p>"+data+"</p>");
				return false;
			}
		}
	});	
});

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if( !emailReg.test( $email ) ) {
        return false;
    } else {
        return true;
    }
}