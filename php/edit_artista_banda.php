<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		if(isAdmin()){
		
			$num_bandas=0;
					
			$sql = "SELECT nome FROM banda;";
			$result = $db->query($sql);	
			$resultBanda = $result->fetchAll();
			$resultBanda_count = sizeof($resultBanda);
			
			$sql = "SELECT nome, documento FROM artista;";
			$result = $db->query($sql);	
			$resultArtista = $result->fetchAll();
			$resultArtista_count = sizeof($resultArtista);	
			
			echo("
			<div class='container'>
			
			
			<form id='insert_banda_artista' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_artista_banda.php'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Adição de Artista-Banda</legend>
			

			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='banda'>Banda </label>
			  <div class='controls'>
				<select id='banda' name='banda' class='input-xlarge'>
				  ");
				  for($j=0; $j<$resultBanda_count; $j++){
						echo "<option>".$resultBanda[$j]['nome']."</option>";
				  }
				  echo ("
				</select>
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='artista'>Artista </label>
			  <div class='controls'>
				<select id='banda' name='artista' class='input-xlarge'>
				  ");
				  for($j=0; $j<$resultArtista_count; $j++){
						echo "<option value='".$resultArtista[$j]['documento']."'>".$resultArtista[$j]['nome']."</option>";
				  }
				  echo ("
				</select>
			  </div>
			</div>
			
			
			<!-- Text input-->
				<div class='control-group'>
					<label class='control-label' for=''>Função</label>
					<div class='controls'>
						<input id='func' name='func' type='text' placeholder='Função' class='input-xlarge' required='' value=''>	
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