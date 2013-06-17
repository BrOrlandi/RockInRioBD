<?php 
	$default_profile_image = "http://z2.cheggcdn.com/sites/default/files/imagecache/50x50/imagefield_default_images/zinch-user-default_0.png";
?>
<!-- NAV BAR -->
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar icon-white"></span>
				<span class="icon-bar icon-white"></span>
				<span class="icon-bar icon-white"></span>
				</a>
			<a href="/rockinriobd/" class="brand">ROCK IN RIO 2013</a>
			<div class="nav-collapse collapse">
				<ul class="nav pull-left">
					<li><a href="/rockinriobd/">LINE-UP</a></li>
					<li><a href="/rockinriobd/dias/">DIAS DO EVENTO</a></li>
					<li><a href="/rockinriobd/ambientes/">AMBIENTES</a></li>
					<li><a href="/rockinriobd/bandas/">BANDAS</a></li>
					<li><a href="/rockinriobd/artistas/">ARTISTAS</a></li>
				</ul>
				<div id="nav-log-bar">
				<?php
				session_start();
				
				if(isLoggedIn()){
					$nome = $_SESSION['nome'];
					$email = $_SESSION['emailMD5'];
					$senha = $_SESSION['senha'];
				?>

				<div class="nav-collapse collapse pull-right">
					<ul class="nav"><li><a href="/rockinriobd/minhaconta/"><?php echo $nome; ?></a></li></ul>
					<a href="/rockinriobd/minhaconta/"><img src="https://secure.gravatar.com/avatar/<?php echo $email; ?>?d=<?php echo $default_profile_image ?>&s=50"/></a>
              		<button id="nav-logout" style="margin-left: 30px" class="btn btn-primary">Sair</button>
				</div>
				
				<?php
				}else{
				?>
				
				<form id="nav_logar" method="POST" data-async class="navbar-form pull-right">
					<input id="nav_email" name="nav_email" class="span2" type="text" placeholder="E-mail">
					<input id="nav_senha" name="nav_senha" class="span2" type="password" placeholder="Senha">
					<button type="submit" class="btn btn-primary">Entrar</button>
					<a style="margin-left: 30px" href="/rockinriobd/cadastros/cadastro_usuario.php" class="btn btn-primary">Cadastre-se</a>
				</form>
				
				<?php
				}
				
				?>
				</div>
				
			</div>
		</div>
	</div>
</div>
<div id="error_message">
</div>
<!-- END NAV BAR -->

<?php
function isAdmin(){
	if(isset($_SESSION['funcionario']) && $_SESSION['funcionario'] == true){
		return true;
	}else{
		return false;
	}
}

function isLoggedIn(){
	if(isset($_SESSION['emailMD5'])){
		return true;
	}else{
		return false;
	}
}
?>