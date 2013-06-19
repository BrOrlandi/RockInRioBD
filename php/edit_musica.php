<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		if(isAdmin()){
			
			
			
			if (isset($_REQUEST['b'])){
			
				$banda=$_REQUEST['b'];
				echo("
			<div class='container'>
			
			
			<form id='insert_membro' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_musica.php'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Inserção de Música da Banda ".$banda."</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='titulo'>Título</label>
			  <div class='controls'>
					<input id='titulo' name='titulo' type='text' placeholder='' class='input-xlarge' required='' value=''>
	
				
			  </div>
			</div>
	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='duracao'>Duração</label>
			  <div class='controls'>
				<input id='duracao' name='duracao' type='text' placeholder='' class='input-xlarge' required='' value=''>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='posicao'>Posição</label>
			  <div class='controls'>
				<input id='posicao' name='posicao' type='text' placeholder='' class='input-xlarge' required='' value=''>
				
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
				$titulo=$_REQUEST['m'];
				$banda=$_REQUEST['ba'];

				
				$sql = "SELECT * FROM musica WHERE titulo='".$titulo."' AND banda = '".$banda."';";
				$result = $db->query($sql);	
				$row = $result->fetch();
				
				
				$duracao = $row['duracao'];
				$posicao = $row['posicao'];

				
echo("
		<div class='container'>
			
			
			<form id='insert_membro' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_musica.php?m=".$titulo."'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Edição de Música da Banda ".$banda."</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='titulo'>Título</label>
			  <div class='controls'>
					<input id='titulo' name='titulo' type='text' placeholder='' class='input-xlarge' required='' value='".$titulo."' readonly>
			  </div>
			</div>
	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='duracao'>Duração</label>
			  <div class='controls'>
				<input id='duracao' name='duracao' type='text' placeholder='' class='input-xlarge' required='' value='".$duracao."'>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='posicao'>Posição</label>
			  <div class='controls'>
				<input id='posicao' name='posicao' type='text' placeholder='' class='input-xlarge' required='' value='".$posicao."'>
				
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
				<a href='/rockinriobd/php/excluir_musica.php?m=".$titulo."&b=".$banda."' class=\"btn btn-danger\">Excluir</a>
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