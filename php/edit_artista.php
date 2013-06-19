<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		if(isAdmin()){
		
			$num_bandas=0;
		
			$flag_parametro = isset($_REQUEST['a']);
			
			$sql = "SELECT nome FROM banda;";
			$result = $db->query($sql);	
			$resultBanda = $result->fetchAll();
			$resultBanda_count = sizeof($resultBanda);	
			
			if ($flag_parametro){
				$artista = $_REQUEST['a'];	
				$sql = "SELECT * FROM artista A WHERE A.documento='".$artista."';";
				$result = $db->query($sql);	
				$row = $result->fetch();
				
				$sql = "SELECT banda, funcao FROM banda_artista WHERE artista = '".$artista."';";
				$result = $db->query($sql);	
				$resultBA = $result->fetchAll();
				$resultBA_count = sizeof($resultBA);
				
				$num_bandas=$resultBA_count;
				
				$nome_artistico = $row['nome_artistico'];
				$nome = $row['nome'];
				$documento = $row['documento'];
				$sexo = $row['sexo'];
				$data_nasc = $row['data_nasc'];
			}
			
			
			if ($flag_parametro){
				echo("
			<div class='container'>
			
			
			<form id='update_artista' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_artista.php?a=".$artista."?num=".$num_bandas."'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Edição de Artista</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome'>Nome</label>
			  <div class='controls'>
					<input id='nome' name='nome' type='text' placeholder='Nome Completo' class='input-xlarge' required='' value='".$nome."'>
	
				
			  </div>
			</div>
	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome_artistico'>Nome Artístico</label>
			  <div class='controls'>
				<input id='nome_artistico' name='nome_artistico' type='text' placeholder='Nome Artístico' class='input-xlarge' required='' value='".$nome_artistico."'>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='documento'>Documento</label>
			  <div class='controls'>
				<input id='documento' name='documento' type='text' placeholder='Insira aqui o documento' class='input-xlarge' required='' value='".$documento."'>
				
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
					
			<div class='control-group'>
			  <div class='controls'>
				<a href='/rockinriobd/artistas/artista_banda.php'><button type='button' class='btn btn-primary'>Gerenciar Bandas</button></a>

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
			
			<!-- Button -->
			<div class='control-group'>
			  <label class='control-label' for='save'></label>
			  <div class='controls'>
				<button type='submit' id='save' name='submit' class='btn btn-primary'>Salvar Alterações</button>
				<a href='/rockinriobd/php/excluir_artista.php?a=".$artista."' class=\"btn btn-danger\">Excluir</a>
			  </div>
			</div>
						
			</fieldset>
			</form>
				
				<div id='message' class='alert invisible'></div>	
								
				");	
				
			} else {		
				echo("
			<div class='container'>
			
			
			<form id='update_artista' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_artista.php'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Adição de Artista</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome'>Nome</label>
			  <div class='controls'>
				<input id='nome' name='nome' type='text' placeholder='Nome Completo' class='input-xlarge' required=''>
	
				
			  </div>
			</div>
	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome_artistico'>Nome Artístico</label>
			  <div class='controls'>
				<input id='nome_artistico' name='nome_artistico' type='text' placeholder='Nome Artístico' class='input-xlarge' required=''>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='documento'>Documento</label>
			  <div class='controls'>
				<input id='documento' name='documento' type='text' placeholder='Insira aqui o documento' class='input-xlarge' required=''>
				
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
			
			
			
			
			
			
			
			<div id='banda_div'>

			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='banda'>Banda </label>
			  <div class='controls'>
				<select id='banda' name='banda0' class='input-xlarge'>
				  ");
				  for($j=0; $j<$resultBanda_count; $j++){
						echo "<option>".$resultBanda[$j]['nome']."</option>";
				  }
				  echo ("
				</select>
			  </div>
			</div>
			
			
			<!-- Text input-->
				<div class='control-group'>
					<label class='control-label' for=''>Função na Banda</label>
					<div class='controls'>
						<input id='func' name='func0' type='text' placeholder='Função' class='input-xlarge' required='' value=''>	
					</div>
			</div>
					
			
			</div>
	
			
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='data_nascimento'>Data Nascimento</label>
			  <div class='controls'>
				<input id='data_nascimento' name='data_nascimento' type='text' placeholder='dd/mm/aaaa' class='input-xlarge' required=''>
				<p class='help-block'>Inserir conforme o formato dd/mm/aaaa</p>
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
			}
		
		}else{
			echo("<p>Acesso negado!</p>");
		}

	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>