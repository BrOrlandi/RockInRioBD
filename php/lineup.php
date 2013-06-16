<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	

	try{
		$sql = "SELECT data FROM dia ORDER BY data;";
		
		$db->prepare($sql);
		$result = $db->query($sql);	
		if($result->rowCount() == 0){
			$erro = "Dados não cadastrados!";
		}else
		{
			
		$sql = "SELECT nome FROM ambiente;";
		$db->prepare($sql);
		$result2 = $db->query($sql);
		$ambientes = $result2->fetchAll();
		$ambientes_count = sizeof($ambientes);
		

		//Para Cada DIA
      	for($i=0; $row = $result->fetch(); $i++){
			$dia = $row['data'];
		
		
			echo ("<div class=\"lineup_dia\">
						<div class=\"btn_dia\"><a href=\"#\">".$dia."</a></div><div class=\"row-fluid\">");
			
			
			if($result->rowCount() == 0){
				$erro = "Dados não cadastrados!";
			}else{
			
				//Para cada Ambiente
				for($j=0; $j<$ambientes_count; $j++){
					$ambiente = $ambientes[$j]['nome'];	
						echo ("
							       <div class=\"span3\" id=\"lineup_ambiente\">
								       <div class=\"btn_ambiente\"><a href=\"#\">".$ambiente."</a></div>");
					
						
						$sql = "SELECT banda FROM atracao
							WHERE dia = '".$dia."' AND ambiente = '".$ambiente."'
							ORDER BY posicao DESC;";
						$db->prepare($sql);
						$result3 = $db->query($sql);	
						if($result3->rowCount() == 0){
							echo ("<div>Em breve!</div>");
						}else{
							$bandas = $result3->fetchAll();
							$bandas_count = sizeof($bandas);
					
							//Percorre todas as bandas de um dado dia/ambiente
							for($k=0; $k<$bandas_count; $k++){
								$banda = $bandas[$k]['banda'];					
								
								echo ("
								<div class=\"lineup_banda\">
								<p><a href=\"#\" class=\"btn btn-info btn_banda\">".$banda."</a></p>
								</div>\n");
								
							}
						}
									   
						echo ("</div>");
						
				}
			
			}
			echo ("</div></div>");
      	}
			
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>