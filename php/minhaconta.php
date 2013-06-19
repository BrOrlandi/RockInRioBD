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
				echo "</p><p>";
				echo "<h3 style=\"color:#ffffff;\">Meus Ingressos:</h3>";
				
				$sql = "SELECT 	EXTRACT(DAY FROM dia) as dia,
								EXTRACT(MONTH FROM dia) as mes,
								EXTRACT(DAY FROM data) as dia_compra,
								EXTRACT(MONTH FROM data) as mes_compra,
								EXTRACT(HOUR FROM hora) as hora_compra,
								EXTRACT(MINUTE FROM hora) as minuto_compra,
								numero,tipo 
								FROM ingresso WHERE comprador='".$_SESSION['documento']."';";
				$result = $db->query($sql);	
				$dados = $result->fetchAll();
				$dados_count = sizeof($dados);
				
				if($dados_count == 0){
					echo "Não comprou nenhum ingresso ainda. Clique <a href='/rockinriobd/'>aqui</a> para comprar ingressos.";
				}			
				else {
				echo "<table class=\"table\">
					        <thead>
					          <tr>
					            <th>Dia do Evento</th>
					            <th>Número do Ingresso</th>
					            <th>Tipo do Ingresso</th>
					            <th>Data e Hora de Compra</th>
					          </tr>
					        </thead>
					        <tbody>";
					for($i=0;$i<$dados_count;$i++){
						echo "<tr>
					            <td>".$dados[$i]['dia']."/".$dados[$i]['mes']."</td>
					            <td>".$dados[$i]['numero']."</td>
					            <td>".$dados[$i]['tipo']."</td>
					            <td>".str_pad($dados[$i]['hora_compra'], 2,'0', STR_PAD_LEFT).":".str_pad($dados[$i]['minuto_compra'], 2,'0', STR_PAD_LEFT)."</td>
					          </tr>";
					}
					echo "</tbody></table>";
				}
				echo "</p>";
			}
		}else
		{
			echo "Você não está logado!";
		}
		
	}

	if($flagAdmin){
		
		$sql = "SELECT 	D.data,
			EXTRACT(DAY FROM D.data) AS dia,
			EXTRACT(MONTH FROM D.data) AS mes,
			COUNT(I.comprador) AS pessoas,
			COUNT(P.pne) AS pnes,
			COUNT(IM.tipo)*130 + COUNT(II.tipo)*260 AS renda,
			COUNT(IM.tipo) AS meias,
			COUNT(II.tipo) AS inteiras 
		FROM Ingresso I 
		JOIN Dia D ON I.dia = D.data 
		LEFT JOIN Publico P ON I.comprador=P.usuario AND P.pne LIKE 'SIM' 
		LEFT JOIN Ingresso IM ON I.dia=IM.dia AND I.numero = IM.numero AND IM.tipo LIKE 'MEIA' 
		LEFT JOIN Ingresso II ON I.dia=II.dia AND I.numero = II.numero AND II.tipo LIKE 'INTEIRA' 
		GROUP BY (D.data) 
		ORDER BY (D.data);";
		
		$result = $db->query($sql);
		// Cada Dia	
   		for($i=0; $row = $result->fetch(); $i++)
   		{
   			
			$dia = $row['dia'];
			$mes = $row['mes'];
			$diaSemana = converterDiaSemana(date_format(date_create($row['data']), "w"));
			
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
	           			<td>". $row['pessoas'] ."</td>
	           		</tr>
	           		<tr>
	           			<td>Número de Portadores de Necessidade no dia </td>
	           			<td>". $row['pnes'] ."</td>
	           		</tr>
	           		<tr>
	           			<td>Ingressos Meia(R$ 130,00)</td>
	           			<td>". $row['meias'] ."</td>
	           		</tr>
	           		<tr>
	           			<td>Ingressos Inteira(R$ 260,00)</td>
	           			<td>". $row['inteiras'] ."</td>
	           		</tr>
	           		<tr>
	           			<td>Renda gerada pelos ingressos </td>
	           			<td>R$ ". $row['renda'] .",00</td>
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