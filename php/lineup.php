<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
$IMPRIME_DIA = true;
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/dias.php");
	

	try{		
		$sql = "SELECT data,EXTRACT(day FROM D.data) AS dia,EXTRACT(month FROM D.data) AS mes FROM Dia D ORDER BY dia,mes ASC;";
		
		$result = $db->query($sql);	
		if($result->rowCount() == 0){
			$erro = "Dados não cadastrados!";
		}else
		{
			
		$sql = "SELECT nome,EXTRACT(HOUR FROM hora_de_inicio) AS horas,EXTRACT(MINUTE FROM hora_de_inicio) AS minutos FROM Ambiente;";
		$result2 = $db->query($sql);
		$ambientes = $result2->fetchAll();
		$ambientes_count = sizeof($ambientes);
		

		//Para Cada DIA
      	for($i=0; $row = $result->fetch(); $i++){
      		$data = $row['data'];
      		imprimeDia($data);
      	}
			
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>