<?php


require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$email = $_POST['nav_email'];
	$senha = $_POST['nav_senha'];
	session_start();

	try{
		$sql = "SELECT documento,nome, senha,tipo FROM Usuario WHERE (email='".$email."');";
		//echo $sql;
		$result = $db->query($sql);	
		if($result->rowCount() == 0){
			$erro = "Usuário não encontrado.";
		}else
		{
			$data = $result->fetch();
			if(md5($senha) == $data['senha']){
				$_SESSION['documento'] = $data['documento'];
				$_SESSION['nome'] = $data['nome'];
				$_SESSION['senha'] = $data['senha'];
				$_SESSION['emailMD5'] = md5($email);
				if($data['tipo'] == 'FUNCIONARIO')
				{
					$_SESSION['funcionario'] = true;
				}
				echo "1";
			}
		}
	}
	catch(PDOException $e){
		echo "Erro: " . $e->getMessage();
	}

?>