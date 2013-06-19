<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		if(isAdmin()){
			
			
			
			if (isset($_REQUEST['b'])){
			
				$banda=$_REQUEST['b'];
				echo("
			<div class='container'>
			
			
			<form id='insert_membro' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_membro.php'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Inserção de Membro da Banda ".$banda."</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome'>Nome</label>
			  <div class='controls'>
					<input id='nome' name='nome' type='text' placeholder='Nome Completo' class='input-xlarge' required='' value=''>
	
				
			  </div>
			</div>
	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='funcao'>Função</label>
			  <div class='controls'>
				<input id='funcao' name='funcao' type='text' placeholder='' class='input-xlarge' required='' value=''>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='documento'>Documento</label>
			  <div class='controls'>
				<input id='documento' name='documento' type='text' placeholder='' class='input-xlarge' required='' value=''>
				
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='sexo'>Sexo</label>
			  <div class='controls'>
				<select id='sexo' name='sexo' class='input-xlarge'>
					<option value='MASCULINO'>Masculino</option>
					<option value='FEMININO'>Feminino</option>
				</select>
			  </div>
			</div>

			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='data_nascimento'>Data Nascimento</label>
			  <div class='controls'>
				<input id='data_nascimento' name='data_nascimento' type='text' placeholder='dd/mm/aaaa' class='input-xlarge' required='' value=''>
				<p class='help-block'>Inserir conforme o formato dd/mm/aaaa</p>
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='banda'>Banda</label>
			  <div class='controls'>
				<select id='banda' name='banda' class='input-xlarge'>
					<option value='".$banda."' selected='selected'>".$banda."</option>
				</select>
			  </div>
			</div>
			
			<!-- Button -->
			<div class='control-group'>
			  <label class='control-label' for='save'></label>
			  <div class='controls'>
				<button type='submit' id='save' name='submit' class='btn btn-primary'>Inserir</button>
			  </div>
			</div>
						
			</fieldset>
			</form>
				
				<div id='message' class='alert invisible'></div>	
								
				");	
			}else if (isset($_REQUEST['m'])){
				$documento=$_REQUEST['m'];
				
				$sql = "SELECT * FROM membro WHERE documento='".$documento."';";
				$result = $db->query($sql);	
				$row = $result->fetch();
				
				
				$nome = $row['nome'];
				$sexo = $row['sexo'];
				$data_nasc = $row['data_nasc'];
				$funcao = $row['funcao'];
				$banda = $row['banda'];
				
echo("
			<div class='container'>
			
			
			<form id='update_membro' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_membro.php?m=".$documento."'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Alteração de Membro da Banda ".$banda."</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome'>Nome</label>
			  <div class='controls'>
					<input id='nome' name='nome' type='text' placeholder='Nome Completo' class='input-xlarge' required='' value='".$nome."'>
	
				
			  </div>
			</div>
	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='funcao'>Função</label>
			  <div class='controls'>
				<input id='funcao' name='funcao' type='text' placeholder='' class='input-xlarge' required='' value='".$funcao."'>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='documento'>Documento</label>
			  <div class='controls'>
				<input id='documento' name='documento' type='text' placeholder='' class='input-xlarge' required='' value='".$documento."'>
				
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='sexo'>Sexo</label>
			  <div class='controls'>
				<select id='sexo' name='sexo' class='input-xlarge'>
				");
					if ($sexo == 'MASCULINO'){
						echo("<option value='MASCULINO' selected='selected' >Masculino</option>");
						echo("<option value='FEMININO'>Feminino</option>");
					}else{
						echo("<option value='MASCULINO'>Masculino</option>");
						echo("<option value='FEMININO' selected='selected' >Feminino</option>");
					}				  
				 echo("
				</select>
			  </div>
			</div>

			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='data_nascimento'>Data Nascimento</label>
			  <div class='controls'>
				<input id='data_nascimento' name='data_nascimento' type='text' placeholder='dd/mm/aaaa' class='input-xlarge' required='' value='".$data_nasc."'>
				<p class='help-block'>Inserir conforme o formato dd/mm/aaaa</p>
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='banda'>Banda</label>
			  <div class='controls'>
				<select id='banda' name='banda' class='input-xlarge'>
					<option value='".$banda."' selected='selected'>".$banda."</option>
				</select>
			  </div>
			</div>
			
			<!-- Button -->
			<div class='control-group'>
			  <label class='control-label' for='save'></label>
			  <div class='controls'>
				<button type='submit' id='save' name='submit' class='btn btn-primary'>Atualizar</button>
				<a href='/rockinriobd/php/excluir_membro.php?m=".$documento."' class=\"btn btn-danger\">Excluir</a>
			  </div>
			</div>
						
			</fieldset>
			</form>
				
				<div id='message' class='alert invisible'></div>	
								
				");					
			}	
		}else{
			echo("<p>Acesso negado!</p>");
		}

	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>