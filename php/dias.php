<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/funcoes_uteis.php");
	//session_start();
	

	try{
		
		$flag_request = 0;
		if(isset($_REQUEST['d'])){
			$data = $_REQUEST['d'];
			$flag_request = 1;
			imprimeDia($data);
		}
			
		if($flag_request == 0 && !isset($IMPRIME_DIA))
		{
		//Seleciona as datas, extrai o dia e o mes, e conta o número de ingressos disponíveis.
		$sql = "SELECT D.data,EXTRACT(day FROM D.data) AS dia,EXTRACT(month FROM D.data) AS mes,COUNT(D.data) AS ingressos FROM Dia D JOIN Ingresso I ON D.data=I.dia WHERE I.comprador IS NULL GROUP BY D.data ORDER BY dia,mes ASC;";
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
				$ingressos = $row['ingressos'];
				$diaSemana = converterDiaSemana(date_format(date_create($data), "w"));
		
				echo "<div class=\"lineup_banda\">
					<p><a href=\"/rockinriobd/dias/?d=".$data."\" class=\"btn btn-info btn_banda\">".$diaSemana." - ".$dia."/".$mes."</a>";
				
				if($ingressos > 0){
					echo "<a href=\"/rockinriobd/ingressos/?c=".$data."\" class=\"btn btn-success ingressos\">COMPRAR INGRESSOS</a>";
				}else{
					echo "<a class=\"btn btn-danger ingressos disabled\">INGRESSOS ESGOTADOS</a>";
				}
								
				echo "</p></div>";
			
			
      		}
			
		}
		echo ("</div></div>");
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

function imprimeDia($data){
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
		
	$sql = "SELECT EXTRACT(day FROM D.data) AS dia,EXTRACT(month FROM D.data) AS mes,COUNT(D.data) AS ingressos FROM Dia D JOIN Ingresso I ON D.data=I.dia WHERE I.comprador IS NULL AND D.data='".$data."'GROUP BY D.data;";
	
	$result = $db->query($sql);	
	if($result->rowCount() == 0){
		$erro = "Dados não cadastrados!";
		return false;
	}else
	{
	$flag_request = 1;
	$row = $result->fetch();
	$dia = $row['dia'];
	$mes = $row['mes'];
	$ingressos = $row['ingressos'];
	$diaSemana = converterDiaSemana(date_format(date_create($data), "w"));
	
	$sql = "SELECT nome,EXTRACT(HOUR FROM hora_de_inicio) AS horas,EXTRACT(MINUTE FROM hora_de_inicio) AS minutos FROM Ambiente;";
	$result2 = $db->query($sql);
	$ambientes = $result2->fetchAll();
	$ambientes_count = sizeof($ambientes);
	
	echo ("<div class=\"lineup_dia\"><span class=\"btn_dia\"><a href=\"/rockinriobd/dias/?d=".$data."\">".$diaSemana." - ".$dia."/".$mes."</a></span>");
	if($ingressos > 0){
		echo "<a style='margin-top:-5px;' href=\"/rockinriobd/ingressos/?c=".$data."\" class=\"btn btn-success ingressos\">COMPRAR INGRESSOS</a>";
	}else{
		echo "<a style='margin-top:-5px;' class=\"btn btn-danger ingressos disabled\">INGRESSOS ESGOTADOS</a>";
	}
	echo ("<div class=\"row-fluid\">");
		
		
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
							<div class=\"lineup_banda\" style='float: left;'>
							<p><a href=\"/rockinriobd/bandas/?b=".$banda."\" class=\"btn btn-info btn_banda\">".$banda."</a></p>
							</div>\n");
							if (isAdmin()){
								echo ("
								<div style='float: right;'>
								<p><a href='/rockinriobd/php/excluir_atracao.php?d=".$data."&a=".$ambiente."&b=".$banda."' class=\"btn btn-danger btn_banda\">X</a></p>
								</div>\n");
							}
							
						}
					}
								   
					echo ("</div>");
					
			}
		
		}
		echo ("</div></div>");
	}
	return true;
}
?>