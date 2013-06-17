<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/funcoes_uteis.php");
	//session_start();
	

	try{
		
		$flag_request = 0;
		
		if(isset($_REQUEST['d'])){
			$data = $_REQUEST['d'];	
		$sql = "SELECT EXTRACT(day FROM D.data) AS dia,EXTRACT(month FROM D.data) AS mes FROM Dia D WHERE D.data='".$data."';";
		
		$result = $db->query($sql);	
		if($result->rowCount() == 0){
			$erro = "Dados não cadastrados!";
		}else
		{
		$flag_request = 1;
		$row = $result->fetch();
		$dia = $row['dia'];
		$mes = $row['mes'];
		$diaSemana = converterDiaSemana(date_format(date_create($data), "w"));
		
		$sql = "SELECT nome,EXTRACT(HOUR FROM hora_de_inicio) AS horas,EXTRACT(MINUTE FROM hora_de_inicio) AS minutos FROM Ambiente;";
		$result2 = $db->query($sql);
		$ambientes = $result2->fetchAll();
		$ambientes_count = sizeof($ambientes);
		
		echo ("<div class=\"lineup_dia\"><div class=\"btn_dia\"><a href=\"/rockinriobd/dias/?d=".$data."\">".$diaSemana." - ".$dia."/".$mes."</a></div><div class=\"row-fluid\">");
			
			
			if($ambientes_count == 0){
				$erro = "Dados não cadastrados!";
			}else{
				//Para cada Ambiente
				for($j=0; $j<$ambientes_count; $j++){
					$ambiente = $ambientes[$j]['nome'];	
						echo ("<div class=\"span3\" id=\"lineup_ambiente\">
								       <div class=\"btn_ambiente\"><a href=\"/rockinriobd/ambientes/?a=".$ambiente."\">".$ambiente."</a></div>");
							echo ("<p>A partir das ".$ambientes[$j]['horas']."h".$ambientes[$j]['minutos']."</p>");
					
						
						$sql = "SELECT banda FROM atracao
							WHERE dia = '".$data."' AND ambiente = '".$ambiente."'
							ORDER BY posicao DESC;";
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
								<p><a href=\"/rockinriobd/bandas/?b=".$banda."\" class=\"btn btn-info btn_banda\">".$banda."</a></p>
								</div>\n");
								
							}
						}
									   
						echo ("</div>");
						
				}
			
			}
			echo ("</div></div>");
		}
		}
			
		if($flag_request == 0)
		{
		$sql = "SELECT data,EXTRACT(day FROM D.data) AS dia,EXTRACT(month FROM D.data) AS mes FROM Dia D ORDER BY dia,mes ASC;";
		echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">Dias</h1>
				<div class=\"row-fluid\">");
		
		$result = $db->query($sql);	
		if($result->rowCount() == 0){
			$erro = "Dados não cadastrados!";
		}else
		{

      		for($i=0; $row = $result->fetch(); $i++){
	      		$data = $row['data'];
				$dia = $row['dia'];
				$mes = $row['mes'];
				$diaSemana = converterDiaSemana(date_format(date_create($data), "w"));
		
				echo ("<div class=\"lineup_banda\">
								<p><a href=\"/rockinriobd/dias/?d=".$data."\" class=\"btn btn-info btn_banda\">".$diaSemana." - ".$dia."/".$mes."</a></p>
								</div>");
			
			
      		}
			
		}
		echo ("</div></div>");
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>