<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$email = $_POST['nav_email'];
	$senha = $_POST['nav_senha'];
	session_start();

	try{
		$sql = "SELECT nome, senha FROM Usuario WHERE (email='".$email."');";
		//echo $sql;
		$db->prepare($sql);
		$result = $db->query($sql);	
		if($result->rowCount() == 0){
			$erro = "Usuário não encontrado.";
		}else
		{
			$data = $result->fetchAll();
			if(md5($senha) == $data[0]['senha']){
				$_SESSION['nome'] = $data[0]['nome'];
				$_SESSION['senha'] = $data[0]['senha'];
				$_SESSION['emailMD5'] = md5($email);
				echo "1";
			}
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>