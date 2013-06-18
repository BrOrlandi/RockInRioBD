<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Rock in Rio 2013</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css"/>
	    <link href="css/bd.css" rel="stylesheet" type="text/css">
		
		<script src="/rockinriobd/js/jquery-2.0.1.min.js"></script>
		<script src="/rockinriobd/bootstrap/js/bootstrap.min.js"></script>
		<script src="/rockinriobd/js/navbar_login.js"></script>

	</head>
	<body>
		

		<!-- Incluir Barra de Navegação -->
		<?php require($_SERVER["DOCUMENT_ROOT"] . "/rockinriobd/navbar.php"); ?>
		
		<div class="hero-unit">
					<h1>LineUp</h1>
					<p>Confira o LineUp do Rock in Rio!</p>     
            
		</div>
		
		<div class="container">
			<div class="row-fluid">
            	<div class="span6">
            		<p>Confira o Line-Up completo do Rock In Rio 2013! O Line-Up deste ano está separado por dias e ambientes. Para saber mais sobre algum ambiente ou banda, basta clicar sobre ele.</p>
                </div>
				<div class="span6">
                	<div class="text-center">
						<h1>Ingressos à venda!!!</h1>
					<?php if(!isLoggedIn()){ ?>
						<p>Faça o seu cadastro para comprar!</p>
						<p><a class="btn btn-large btn-primary" href="/rockinriobd/cadastros/cadastro_usuario.php"><span class="icon-user icon-white"></span> Cadastre-se Aqui!</a></p>
                    <?php } ?>
                    </div>
				</div>
			</div>
		</div>
        <div class="container">
        	<?php require($_SERVER["DOCUMENT_ROOT"] . "/rockinriobd/php/lineup.php"); ?> 
        </div>
	</body>
	
</html>