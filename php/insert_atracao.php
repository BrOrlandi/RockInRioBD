<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		if(isAdmin()){
						
			$sql = "SELECT nome FROM banda;";
			$result = $db->query($sql);	
			$resultBanda = $result->fetchAll();
			$resultBanda_count = sizeof($resultBanda);	
			
			$sql = "SELECT data FROM dia;";
			$result = $db->query($sql);	
			$resultDia = $result->fetchAll();
			$resultDia_count = sizeof($resultDia);	
			
			$sql = "SELECT nome FROM ambiente;";
			$result = $db->query($sql);	
			$resultAmbiente = $result->fetchAll();
			$resultAmbiente_count = sizeof($resultAmbiente);	

				echo("
			<div class='container'>
			
			
			<form id='insert_atracao' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_atracao.php'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Inserção de Atração</legend>

			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='dia'>Dia</label>
			  <div class='controls'>
				<select id='dia' name='dia' class='input-xlarge'>
				");
					for($i=0; $i<$resultDia_count; $i++){
						echo("<option value='".$resultDia[$i]['data']."'>".$resultDia[$i]['data']."</option>");
					}			  
				 echo("
				</select>
			  </div>
			</div>
					
					
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='banda'>Banda</label>
			  <div class='controls'>
				<select id='banda' name='banda' class='input-xlarge'>
				");
					for($i=0; $i<$resultBanda_count; $i++){
						echo("<option value='".$resultBanda[$i]['nome']."'>".$resultBanda[$i]['nome']."</option>");
					}			  
				 echo("
				</select>
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='banda'>Ambiente</label>
			  <div class='controls'>
				<select id='ambiente' name='ambiente' class='input-xlarge'>
				");
					for($i=0; $i<$resultAmbiente_count; $i++){
						echo("<option value='".$resultAmbiente[$i]['nome']."'>".$resultAmbiente[$i]['nome']."</option>");
					}			  
				 echo("
				</select>
			  </div>
			</div>

			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='posicao'>Posicao</label>
			  <div class='controls'>
				<input id='posicao' name='posicao' type='text' placeholder='' class='input-xlarge' required='' value=''>
				<p class='help-block'></p>
			  </div>
			</div>

			<legend>Camarim</legend>

			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='camarim'>Camarim</label>
			  <div class='controls'>
				<input id='camarim' name='camarim' type='text' placeholder='' class='input-xlarge' required='' value=''>
				<p class='help-block'></p>
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='posicao'>Capacidade</label>
			  <div class='controls'>
				<input id='capacidade' name='capacidade' type='text' placeholder='' class='input-xlarge' required='' value=''>
			  </div>
			</div>
			
			<!-- Button -->
			<div class='control-group'>
			  <label class='control-label' for='save'></label>
			  <div class='controls'>
				<button type='submit' id='save' name='submit' class='btn btn-primary'>Cadastrar</button>
			  </div>
			</div>
			
			</fieldset>
			</form>
				
				<div id='message' class='alert invisible'></div>	
								
				");	
				
				
		}else{
			echo("<p>Acesso negado!</p>");
		}

	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>