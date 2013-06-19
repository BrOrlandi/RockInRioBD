<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		if(isAdmin()){
			
			$flag_parametro = isset($_REQUEST['b']);

			$sql = "SELECT * FROM empresario;";
			$result = $db->query($sql);	
			$resultEmp = $result->fetchAll();
			$resultEmp_count = sizeof($resultEmp);
			
			if ($flag_parametro){
				$banda = $_REQUEST['b'];	
				$sql = "SELECT * FROM banda WHERE nome='".$banda."';";
				$result = $db->query($sql);	
				$row = $result->fetch();
				
				
				$nome = $row['nome'];
				$ano_de_formacao = $row['ano_de_formacao'];
				$estilo = $row['estilo'];
				$site = $row['site'];
				$emp_doc = $row['empresario'];
				
				$sql = "SELECT * FROM empresario WHERE documento='".$emp_doc."';";
				$result = $db->query($sql);	
				$row2 = $result->fetch();
				
				$emp_nome = $row2['nome'];
				$emp_sexo = $row2['sexo'];
				$emp_data_nasc = $row2['data_nasc'];
				$emp_email = $row2['email'];
				$emp_telefone = $row2['telefone'];
			}
			
			
			if ($flag_parametro){
				echo("
			<div class='container'>
			
			
			<form id='update_banda' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_banda.php?b=".$banda."'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Edição de Banda</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome'>Nome</label>
			  <div class='controls'>
					<input id='nome' name='nome' type='text' placeholder='Nome da Banda' class='input-xlarge' required='' value='".$nome."'>
	
				
			  </div>
			</div>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='ano_de_formacao'>Ano de Formação</label>
			  <div class='controls'>
				<input id='ano_de_formacao' name='ano_de_formacao' type='text' placeholder='dd/mm/aaaa' class='input-xlarge' required='' value='".$ano_de_formacao."'>
				<p class='help-block'>Inserir conforme o formato dd/mm/aaaa</p>
			  </div>
			</div>	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='estilo'>Estilo</label>
			  <div class='controls'>
				<input id='estilo' name='estilo' type='text' placeholder='Estilo' class='input-xlarge' required='' value='".$estilo."'>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='site'>Site</label>
			  <div class='controls'>
				<input id='site' name='site' type='text' placeholder='Insira aqui o site' class='input-xlarge' required='' value='".$site."'>
				
			  </div>
			</div>
						
			<div class='control-group'>
			  <div class='controls'>
				<a href='/rockinriobd/membro/edit.php?b=".$banda."'><button type='button' class='btn btn-primary'>Adicionar Membro</button></a>
				<a href='/rockinriobd/bandas/cadastro_musica.php?b=".$banda."'><button type='button' class='btn btn-primary'>Adicionar Música</button></a>
			  </div>
			</div>
			
			<legend>Empresário</legend>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='emp_nome'>Nome</label>
			  <div class='controls'>
				<input id='emp_nome' name='emp_nome' type='text' placeholder='Nome do Empresário' class='input-xlarge' required='' value='".$emp_nome."'>
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='emp_sexo'>Sexo</label>
			  <div class='controls'>
				<select id='emp_sexo' name='emp_sexo' class='input-xlarge'>
				");
					if ($emp_sexo == 'MASCULINO'){
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
			  <label class='control-label' for='emp_data_nasc'>Data de Nascimento</label>
			  <div class='controls'>
				<input id='emp_data_nasc' name='emp_data_nasc' type='text' placeholder='dd/mm/aaaa' class='input-xlarge' required='' value='".$emp_data_nasc."'>
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='emp_email'>Email</label>
			  <div class='controls'>
				<input id='emp_email' name='emp_email' type='text' placeholder='' class='input-xlarge' required='' value='".$emp_email."'>
			  </div>
			</div>

			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='emp_telefone'>Telefone</label>
			  <div class='controls'>
				<input id='emp_telefone' name='emp_telefone' type='text' placeholder='' class='input-xlarge' required='' value='".$emp_telefone."'>
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='documento'>Documento</label>
			  <div class='controls'>
				<input id='documento' name='documento' type='text' placeholder='' class='input-xlarge' required='' value='".$emp_doc."'>
			  </div>
			</div>
			
			<!-- Button -->
			<div class='control-group'>
			  <label class='control-label' for='save'></label>
			  <div class='controls'>
				<button type='submit' id='save' name='submit' class='btn btn-primary'>Salvar Alterações</button>
				<a href='/rockinriobd/php/excluir_banda.php?b=".$banda."' class=\"btn btn-danger\">Excluir</a>
			  </div>
			</div>
			
			</fieldset>
			</form>
				
				<div id='message' class='alert invisible'></div>	
								
				");	
				
			} else {		
							echo("
			<div class='container'>
			
			
			<form id='update_banda' class='form-horizontal' method='POST' data-async action='/rockinriobd/php/cadastro_banda.php?'>
			<fieldset>
			
			<!-- Form Name -->
			<legend>Adição de Banda</legend>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='nome'>Nome</label>
			  <div class='controls'>
					<input id='nome' name='nome' type='text' placeholder='Nome da Banda' class='input-xlarge' required='' value=''>
	
				
			  </div>
			</div>
	
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='ano_de_formacao'>Ano de Formação</label>
			  <div class='controls'>
				<input id='ano_de_formacao' name='ano_de_formacao' type='text' placeholder='dd/mm/aaaa' class='input-xlarge' required='' value=''>
				<p class='help-block'>Inserir conforme o formato dd/mm/aaaa</p>
			  </div>
			</div>	
				
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='estilo'>Estilo</label>
			  <div class='controls'>
				<input id='estilo' name='estilo' type='text' placeholder='Estilo' class='input-xlarge' required='' value=''>
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='site'>Site</label>
			  <div class='controls'>
				<input id='site' name='site' type='text' placeholder='Insira aqui o site' class='input-xlarge' required='' value=''>
				
			  </div>
			</div>
			
			
			<legend>Empresário</legend>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='emp_nome'>Nome</label>
			  <div class='controls'>
				<input id='emp_nome' name='emp_nome' type='text' placeholder='Nome do Empresário' class='input-xlarge' required='' value=''>
			  </div>
			</div>
			
			<!-- Select Basic -->
			<div class='control-group'>
			  <label class='control-label' for='emp_sexo'>Sexo</label>
			  <div class='controls'>
				<select id='emp_sexo' name='emp_sexo' class='input-xlarge'>
						<option value='MASCULINO'>Masculino</option>
						<option value='FEMININO'>Feminino</option>
				</select>
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='emp_data_nasc'>Data de Nascimento</label>
			  <div class='controls'>
				<input id='emp_data_nasc' name='emp_data_nasc' type='text' placeholder='dd/mm/aaaa' class='input-xlarge' required='' value=''>
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='emp_email'>Email</label>
			  <div class='controls'>
				<input id='emp_email' name='emp_email' type='text' placeholder='' class='input-xlarge' required='' value=''>
			  </div>
			</div>

			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='emp_telefone'>Telefone</label>
			  <div class='controls'>
				<input id='emp_telefone' name='emp_telefone' type='text' placeholder='' class='input-xlarge' required='' value=''>
			  </div>
			</div>
			
			<!-- Text input-->
			<div class='control-group'>
			  <label class='control-label' for='documento'>Documento</label>
			  <div class='controls'>
				<input id='documento' name='documento' type='text' placeholder='' class='input-xlarge' required='' value=''>
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