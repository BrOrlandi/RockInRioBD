<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/funcoes_uteis.php");

	try{
		
		$flag_request = 0;
		
		if(isset($_REQUEST['a'])){
			$ambiente = $_REQUEST['a'];	
			$sql = "SELECT nome,descricao,EXTRACT(HOUR FROM hora_de_inicio) AS horas,EXTRACT(MINUTE FROM hora_de_inicio) AS minutos FROM Ambiente WHERE nome LIKE '".$ambiente."';";
			$result = $db->query($sql);	
			if($result->rowCount() > 0){
				$flag_request = 1;
				$dados = $result->fetch();
				echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">".$dados['nome']."</h1><div class=\"row-fluid\">");
				echo "<p>".$dados['descricao']."<p>";
				echo "<p>Hora de Início: ".$dados['horas']."h".$dados['minutos']."</p>";
				echo "<h3 style=\"color:#ffffff;\">Atrações:</h3>";
				$sql = "SELECT *,EXTRACT(day FROM dia) AS diad,EXTRACT(month FROM dia) AS mes  FROM Atracao WHERE ambiente LIKE '".$ambiente."' ORDER BY dia,posicao DESC;";
				$result = $db->query($sql);	
				$atracoes = $result->fetchAll();
				$atracoes_count = sizeof($atracoes);
				for($i=0;$i<$atracoes_count;$i++){
					$diaSemana = converterDiaSemana(date_format(date_create($atracoes[$i]['dia']), "w"));
					echo ("<p><span style=\"font-size:18px\">".$diaSemana." - ".$atracoes[$i]['diad']."/".$atracoes[$i]['mes']." - <a href=\"/rockinriobd/bandas/?b=".$atracoes[$i]['banda']."\" class=\"btn btn-info btn_banda\" style=\"margin-top:0px\">".$atracoes[$i]['banda']."</a> - ".$atracoes[$i]['camarim']."</span></p>");
				}
				if($atracoes_count == 0)
				{
					echo "Em breve!";
				}
				echo ("</div></div>");

			}
		}
			
		if($flag_request == 0)
		{
			$sql = "SELECT nome FROM Ambiente;";
			$result = $db->query($sql);	
			$dados = $result->fetchAll();
			$dados_count = sizeof($dados);
			echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">Ambientes</h1>
				<div class=\"row-fluid\">");
			for($i=0;$i<$dados_count;$i++){
				echo ("<p><a href=\"/rockinriobd/ambientes/?a=".$dados[$i]['nome']."\" class=\"btn btn-info btn_banda\" style=\"margin-top:0px\">".$dados[$i]['nome']."</a></p>");
			}
			echo ("</div></div>");			
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>
