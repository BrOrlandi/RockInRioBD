<?php
if(isAdmin()){

require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	

	try{
		
		if(isset($_REQUEST['m'])){
			$membro = $_REQUEST['m'];	
			$sql = "SELECT *,EXTRACT(year FROM age(data_nasc)) AS idade FROM Membro WHERE documento='".$membro."';";
			$result = $db->query($sql);	
			if($result->rowCount() > 0){
				$dados = $result->fetch();
				echo ("<div class=\"lista_todos\"><h1 style=\"color:#ffffff;\">".$dados['nome']."</h1><div class=\"row-fluid\">");
				echo "<p>";
				echo "Sexo: <b>".ucfirst(strtolower($dados['sexo']))."</b></br>";
				echo "Data de Nascimento: <b>".date_format(date_create($dados['data_nasc']), "d/m/Y")." (".$dados['idade']." anos)</b></br>";
				echo "</p>";
				echo ("<span style=\"font-size:18px\">".$dados['funcao']." - <a href=\"/rockinriobd/bandas/?b=".$dados['banda']."\" class=\"btn btn-info btn_banda\" style=\"margin-top:0px\">".$dados['banda']."</a></span>");				
				echo ("</div></div>");
			}
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}
}
?>
