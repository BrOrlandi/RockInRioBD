<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Cadastro - Rock in Rio 2013</title>
		<link rel="stylesheet" href="/rockinriobd/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="/rockinriobd/bootstrap/css/bootstrap-responsive.css"/>

		<script src="/rockinriobd/js/jquery-2.0.1.min.js"></script>
		<script src="/rockinriobd/bootstrap/js/bootstrap.min.js"></script>
		<script src="/rockinriobd/js/navbar_login.js"></script>
	</head>
	<body>
		
		<!-- Incluir Barra de Navegação -->
		<?php require($_SERVER["DOCUMENT_ROOT"] . "/rockinriobd/navbar.php"); ?>
		
				
		<div class="container">
<form id="cadastrar_usuario" class="form-horizontal" method="POST" data-async action="/rockinriobd/php/cadastro_publico.php">
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Usuário</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Nome Completo</label>
  <div class="controls">
    <input id="nome" name="nome" type="text" placeholder="Ex: João Silva" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">CPF</label>
  <div class="controls">
    <input id="documento" name="documento" type="text" placeholder="Ex: XXX.XXX.XXX-XX" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label">Sexo</label>
  <div class="controls">
    <select id="sexo" name="sexo" class="input-xlarge">
      <option value="MASCULINO">Masculino</option>
      <option value="FEMININO">Feminino</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Data de Nascimento</label>
  <div class="controls">
    <input id="data_nasc" name="data_nasc" type="text" placeholder="Ex: 31/12/2013" class="input-xlarge" required="">
    <p class="help-block">No formato: dd/mm/aaaa</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Cartão de Crédito</label>
  <div class="controls">
    <input id="cartao" name="cartao" type="text" placeholder="XXXX-XXXX-XXXX-XXXX" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Endereço</label>
  <div class="controls">
    <input id="endereco" name="endereco" type="text" placeholder="Ex: Rua 15 de Novembro, 3456, São Paulo - SP" class="input-xlarge" required="">
    <p class="help-block">Este endereço será usado para entrega dos ingressos adquiridos.</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Telefone</label>
  <div class="controls">
    <input id="telefone" name="telefone" type="text" placeholder="(11) 1234-5678" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="control-group">
  <label class="control-label">Portador de Necessidades Especiais?</label>
  <div class="controls">
    <label class="radio inline">
      <input type="radio" name="pne" value="SIM">
      Sim
    </label>
    <label class="radio inline">
      <input type="radio" name="pne" value="NAO" checked="checked">
      Não
    </label>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">E-mail</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="Ex: joao.silva@exemplo.com" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label">Senha</label>
  <div class="controls">
    <input id="senha" name="senha" type="password" placeholder="" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label">Confirmar Senha</label>
  <div class="controls">
    <input id="confsenha" name="confsenha" type="password" placeholder="" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
    <button type="submit" id="cadastro_usuario" name="submit" class="btn btn-inverse">Cadastrar</button>
  </div>
</div>

</fieldset>
</form>

			<div id="error" class="well well-small invisible"></div>

		</div>
		
		<script src="/rockinriobd/js/jquery-2.0.1.min.js"></script>
		<script src="/rockinriobd/bootstrap/js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
	</body>
	
</html>