
$('#cadastrar_usuario').submit(function(event) {
	event.preventDefault();

	var $form = $(this);
	
	var email = $('#email').val();
	if(!validateEmail(email)){

		$('#message').removeClass('invisible');
		$('#message').html("<p>E-mail não está em um formato válido.</p>");

		return false;
	}
	
	var senha = $('#senha').val();
	var csenha = $('#confsenha').val();
	if(senha != csenha){
		$('#message').removeClass('invisible');
		$('#message').html("<p>Senha não foi confirmada corretamente.</p>");
		return false;
	}
	
	$('#message').addClass('invisible');
	
	$.ajax({
		dataType: "json",
		type: $form.attr('method'),
		url: $form.attr('action'),
		data: $form.serialize(),
		success: function(data,status){
			if(data != null){
				//var obj = jQuery.parse(data);
				if(data.error == 1)
				{
					$('#message').removeClass('invisible');
					$('#message').html("<p>"+data.message+"</p>");
				}else{
					$('#message').removeClass('invisible');
					$('#message').addClass('alert-success')
					$('#message').html("<p>"+data.message+"</p>");
				}
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