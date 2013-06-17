<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

	try{
		
		$flag_request = 0;
		
		if(isset($_REQUEST['a'])){
			$artista = $_REQUEST['a'];	
			$sql = "SELECT COALESCE(nome_artistico,nome) AS nome_titulo,A.*, EXTRACT(year FROM age(A.data_nasc)) AS idade FROM artista A WHERE A.documento='".$artista."';";
			$result = $db->query($sql);	
			if($result->rowCount() > 0){
				$flag_request = 1;
				$dados = $result->fetch();
				echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">".$dados['nome_titulo']."</h1><div class=\"row-fluid\">");
				echo "<p>";
				echo "Nome: <b>".$dados['nome']."</b></br>";
				echo "Nome Artístico: <b>".$dados['nome_artistico']."</b></br>";
				echo "Sexo: <b>".ucfirst(strtolower($dados['sexo']))."</b></br>";
				echo "Data de Nascimento: <b>".date_format(date_create($dados['data_nasc']), "d/m/Y")." (".$dados['idade']." anos)</b></br>";
				echo "<a href=\"http://www.google.com.br/search?q=".$dados['nome_titulo']."\">Pesquisar <b>".$dados['nome_titulo']."</b> no Google</a></br>";
				echo "</p><p>";
				echo "<h3 style=\"color:#ffffff;\">Bandas:</h3>";
				
				$sql = "SELECT banda,funcao FROM Banda_Artista BA WHERE artista='".$artista."';";
				$result = $db->query($sql);	
				$dados = $result->fetchAll();
				$dados_count = sizeof($dados);
				for($i=0;$i<$dados_count;$i++){
					echo ("<p><span style=\"font-size:18px\">".$dados[$i]['funcao']." - <a href=\"/rockinriobd/bandas/?b=".$dados[$i]['banda']."\" class=\"btn btn-info btn_banda\" style=\"margin-top:0px\">".$dados[$i]['banda']."</a></span></p>");
				}			
				echo "</p>";
				echo ("</div></div>");

			}
		}
			
		if($flag_request == 0)
		{
		$sql ="SELECT A.documento,COALESCE(nome_artistico,nome) as nome_artistico,CASE WHEN A.nome_artistico IS NOT NULL THEN A.nome ELSE NULL END AS nome FROM artista A ORDER BY nome_artistico;";
		//$sql = "SELECT nome, nome_artistico  FROM artista ORDER BY nome_artistico,nome;";
		
		echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">Artistas</h1>
				<div class=\"row-fluid\">");
		
		$result = $db->query($sql);	
		if($result->rowCount() == 0){
			$erro = "Dados não cadastrados!";
		}else
		{
      		for($i=0; $row = $result->fetch(); $i++){

				$nome_artistico = $row['nome_artistico'];
				$nome = $row['nome'];
				$documento = $row['documento'];
		
				if ($nome == null){
					$nome_final = $nome_artistico;
				} else {
					$nome_final = ($nome_artistico." ( ".$nome." )");
				}
				echo ("<div><p><a href=\"/rockinriobd/artistas/?a=".$documento."\" class=\"btn btn-info btn_banda\">".$nome_final."</a></p></div>");
      		}
			
		}
		echo ("</div></div>");
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>
