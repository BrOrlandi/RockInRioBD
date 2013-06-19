<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		$flag_banda = 0;
		
		if(isset($_REQUEST['b'])){
			$banda = $_REQUEST['b'];	
			$sql = "SELECT *  FROM Banda WHERE lower(nome) LIKE lower('".$banda."');";
			$result = $db->query($sql);	
			if($result->rowCount() > 0){
				$flag_banda = 1;
				$dados_banda = $result->fetch();
				echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">".$dados_banda['nome']."</h1><div class=\"row-fluid\">");
				echo "<p>";
				echo "Ano de Formação: <b>".$dados_banda['ano_de_formacao']."</b></br>";
				echo "Estilo: <b>".$dados_banda['estilo']."</b></br>";
				echo "Site: <a href=\"http://".$dados_banda['site']."\">".$dados_banda['site']."</a></br>";
				echo "<a href=\"http://www.google.com.br/search?q=".$dados_banda['nome']."\">Pesquisar <b>".$dados_banda['nome']."</b> no Google</a></br>";
				echo "<p>";
				
				if(isAdmin()){
					$sql = "SELECT *,EXTRACT(year FROM age(data_nasc)) AS idade  FROM Empresario WHERE documento='".$dados_banda['empresario']."';";
					$result = $db->query($sql);	
					$dados = $result->fetch();
				echo "<p>";
				echo "Empresario: <b>".$dados['nome']."</b></br>";
				echo "Documento: <b>".$dados['documento']."</b></br>";
				echo "Sexo: <b>".ucfirst(strtolower($dados['sexo']))."</b></br>";
				echo "Data de Nascimento: <b>".date_format(date_create($dados['data_nasc']), "d/m/Y")." (".$dados['idade']." anos)</b></br>";
				echo "E-mail: <a href=\"mailto:".$dados['email']."\"><b>".$dados['email']."</b></a></br>";
				echo "<a href=\"http://www.google.com.br/search?q=".$dados['nome']."\">Pesquisar <b>".$dados['nome']."</b> no Google</a></br>";
				echo "</p>";
				}
				
				echo "<h3 style=\"color:#ffffff;\">Artistas:</h3>";
				
				$sql = "SELECT DISTINCT A.documento,COALESCE(A.nome_artistico,A.nome) AS nome_titulo FROM Banda_Artista B JOIN Artista A ON B.artista=A.documento WHERE B.banda LIKE '".$dados_banda['nome']."' ORDER BY A.documento;";
				$result = $db->query($sql);	
				$dados = $result->fetchAll();
				$dados_count = sizeof($dados);
				for($i=0;$i<$dados_count;$i++){
					$sql = "SELECT funcao FROM Banda_Artista WHERE banda LIKE '".$dados_banda['nome']."' AND artista='".$dados[$i]['documento']."';";
					$result = $db->query($sql);	
					$dados_funcao = $result->fetchAll();
					$dados_funcao_count = sizeof($dados_funcao);
					echo "<p><span style=\"font-size:18px\"><a href=\"/rockinriobd/artistas/?a=".$dados[$i]['documento']."\" class=\"btn btn-info btn_banda\" style=\"margin-top:0px\">".$dados[$i]['nome_titulo']."</a> - ";
					echo $dados_funcao[0]['funcao'];
					for($j=1;$j<$dados_funcao_count;$j++){
						echo ", ".$dados_funcao[$j]['funcao'];
					}
					echo ".</span></p>";
				}
				if($dados_count == 0)
				{
					echo "<p>Nenhum cadastrado.</p>";
				}
				
				if(isAdmin()){
					//MEMBROS
					echo "<h3 style=\"color:#ffffff;\">Membro da Equipe:</h3>";
					$sql = "SELECT documento,nome,funcao FROM Membro WHERE banda LIKE '".$dados_banda['nome']."';";
					$result = $db->query($sql);	
					$dados = $result->fetchAll();
					$dados_count = sizeof($dados);
					for($i=0;$i<$dados_count;$i++){
						echo "<p><span style=\"font-size:18px\"><a href=\"/rockinriobd/membro/?m=".$dados[$i]['documento']."\" class=\"btn btn-info btn_banda\" style=\"margin-top:0px\">".$dados[$i]['nome']."</a> - ".$dados[$i]['funcao']."<a href=\"/rockinriobd/membro/edit.php?m=".$dados[$i]['documento']."\" class=\"btn btn-primary btn_banda\" style=\"margin-top:0px\">Editar</a></span></p>";
					}
					if($dados_count == 0)
					{
						echo "<p>Nenhum cadastrado.</p>";
					}
					
					
					//MUSICAS
					echo "<h3 style=\"color:#ffffff;\">Músicas:</h3>";
					$sql = "SELECT titulo, EXTRACT(MINUTE FROM duracao) AS minutos, EXTRACT(SECOND FROM duracao) AS segundos,posicao FROM Musica WHERE banda LIKE '".$dados_banda['nome']."';";
					$result = $db->query($sql);	
					$dados = $result->fetchAll();
					$dados_count = sizeof($dados);
					
					echo "<table class=\"table\">
					        <thead>
					          <tr>
					            <th>Música</th>
					            <th>Duração</th>
					          </tr>
					        </thead>
					        <tbody>";
					for($i=0;$i<$dados_count;$i++){
						echo "<tr>
					            <td>".$dados[$i]['titulo']."</td>
					            <td>".str_pad($dados[$i]['minutos'], 2,'0', STR_PAD_LEFT).":".str_pad($dados[$i]['segundos'], 2,'0', STR_PAD_LEFT)."</td>
								<td>
									<div style='float: right;'><a href=\"/rockinriobd/bandas/cadastro_musica.php?m=".$dados[$i]['titulo']."&ba=".$banda."\" class=\"btn btn-primary btn_banda \" style=\"margin-top:0px\">Editar</a></div>
								</td>
					          </tr>";
					}
					echo "</tbody></table>";
					if($dados_count == 0)
					{
						echo "<p>Nenhuma cadastrada.</p>";
					}
					
					echo ("<div style='float: right;'><a href=\"/rockinriobd/bandas/edit.php?b=".$banda."\" class=\"btn btn-primary btn_banda \" style=\"margin-top:0px\">Editar</a></div>");
				}
			
				
				
				echo ("</div></div>");

			}
		}
			
		if($flag_banda == 0)
		{
			$sql = "SELECT nome  FROM banda 
					ORDER BY nome;";
			
			$result = $db->query($sql);	
			if($result->rowCount() == 0){
				$erro = "Dados não cadastrados!";
			}else
			{
				echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">Bandas</h1><div class=\"row-fluid\">");
				
				if (isAdmin()){
					echo ("<div style='float: right;'><a href=\"/rockinriobd/bandas/edit.php\" class=\"btn btn-primary btn_banda \" style=\"margin-top:0px\">Adicionar</a></div>");
				}
	
				//Para Cada Banda
	      		for($i=0; $row = $result->fetch(); $i++){
					$nome = $row['nome'];
			
			
					echo ("<div><p><a href=\"/rockinriobd/bandas/?b=".$nome."\" class=\"btn btn-info btn_banda\">".$nome."</a></p></div>");
				
				
	      		}
				
			}
			echo ("</div></div>");
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>