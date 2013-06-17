<?php

require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/funcoes_uteis.php");

	try{
		
	if(isAdmin()){
		$flagAdmin = true;
	}
	else {
		$flagAdmin = false;
		
		if(isLoggedIn()){
			$sql = "SELECT U.*,EXTRACT(YEAR FROM AGE(U.data_nasc)) AS idade,P.n_cartao,P.pne FROM Usuario U JOIN Publico P ON U.documento=P.usuario WHERE documento='".$_SESSION['documento']."';";
			$result = $db->query($sql);
			if($result->rowCount() > 0){
				$dados = $result->fetch();
				echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">".$dados['nome']."</h1><div class=\"row-fluid\">");			
				echo "<p>";
				echo "Documento: <b>".$dados['documento']."</b></br>";
				echo "E-mail: <b>".$dados['email']."</b></br>";
				echo "Sexo: <b>".ucfirst(strtolower($dados['sexo']))."</b></br>";
				echo "Data de Nascimento: <b>".date_format(date_create($dados['data_nasc']), "d/m/Y")." (".$dados['idade']." anos)</b></br>";
				echo "Endereço: <b>".$dados['endereco']."</b></br>";
				echo "Telefone: <b>".$dados['telefone']."</b></br>";
				echo "Nº Cartão: <b>".$dados['n_cartao']."</b></br>";
				echo "Portador de Necessidades Especiais: <b>".ucfirst(strtolower($dados['pne']))."</b></br>";
				echo "</p>";
			}
		}else
		{
			echo "Você não está logado!";
		}
		
	}

	if($flagAdmin){
		$sql_day = "SELECT data,EXTRACT(DAY FROM data) AS dia,EXTRACT(MONTH FROM data) AS mes FROM dia;";

		$sql = "SELECT count(i.comprador!=NULL) AS num 
				FROM ingresso i
				GROUP BY i.dia
				ORDER BY i.dia;";

		$sql2 = "SELECT count(*) AS num 
				FROM publico f, ingresso i
				WHERE (f.usuario = i.comprador) AND (f.pne like 'SIM')
				GROUP BY i.dia;";

		$sql3 = "SELECT count(*) AS num 
				FROM publico f, ingresso i
				WHERE (f.usuario = i.comprador) AND (i.tipo like 'MEIA')
				GROUP BY i.dia;";

		$sql4 = "SELECT count(*) AS num 
				FROM publico f, ingresso i
				WHERE (f.usuario = i.comprador) AND (i.tipo like 'INTEIRA')
				GROUP BY i.dia;";		

		$resultday = $db->query($sql_day);	

		$result = $db->query($sql);	

		$result2 = $db->query($sql2);	

		$result3 = $db->query($sql3);	

		$result4 = $db->query($sql4);	

   		for($i=0; $day = $resultday->fetch(); $i++)
   		{
   			$infoday	 = $day['data'];
   			$informacao1 = $result->fetch();
   			$informacao2 = $result2->fetch();
   			$informacao3 = $result3->fetch();
   			$informacao4 = $result4->fetch();

   			if($informacao2['num'] == NULL) $value2 = 0;
   			else $value2 = $informacao2['num'];
   			
			$dia = $day['dia'];
			$mes = $day['mes'];
			$diaSemana = converterDiaSemana(date_format(date_create($infoday), "w"));

   			echo("<table class=\"table table-hover\" >
   				 <h3 align='left'><strong>".$diaSemana." - ".$dia."/".$mes ."</strong></h3>
   				 <thead>
          			<tr>
          				<th>Informação</th>
          				<th>Dados</th>
           			</tr>
           		</thead>
				<tbody>
   				<tr>
	           			<td>Número de Pessoas atendidas pelo evento no dia</td>
	           			<td>". $informacao1['num'] ."</td>
	           		</tr>
	           		<tr>
	           			<td>Número de Portadores de Necessidade no dia </td>
	           			<td>". $value2 ."</td>
	           		</tr>
	           		<tr>
	           			<td>Renda gerada pelos ingressos </td>
	           			<td>". (($informacao3['num']*130) + ($informacao4['num']*260)) ."</td>
	           		</tr>
	           	</tbody>
        			</table>");
				
			//$day	 = $resultday->fetch();
   		}
	}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>