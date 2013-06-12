$(document).ready(function(){
	
$('#nav_logar').submit(function(event) {
	event.preventDefault();
	var $form = $(this);
	
	$.ajax({
		type: $form.attr('method'),
		url: "/rockinriobd/php/login.php",
		data: $form.serialize(),
		success: function(data,status){
			if(data == "1"){
				location.reload();
				return true;
			}
		}
	});	
});

$('#nav-logout').click(function() {
	$.ajax({
		type: "POST",
		url: "/rockinriobd/php/logout.php",
		success: function(data,status){
			location.reload();
		}
	});	
	});

});