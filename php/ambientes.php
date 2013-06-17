<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");

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
				
				echo ("</div></div>");

			}
		}
			
		if($flag_request == 0)
		{
			
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>
