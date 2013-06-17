<?php

	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
		$db->beginTransaction();
		
		$sql = "INSERT INTO Usuario VALUES('". $_POST['documento'] ."','". 
			$_POST['nome'] ."','". 
			$_POST['sexo'] ."','". 
			$_POST['data_nasc'] ."','PUBLICO','". 
			$_POST['email'] ."','". 
			md5($_POST['senha']) ."','". 
			$_POST['endereco'] ."','". 
			$_POST['telefone'] ."');";
		$db->exec($sql);
		
		$sql = "INSERT INTO Publico VALUES('". $_POST['documento'] ."','". 
			$_POST['cartao'] ."','". 
			$_POST['pne'] ."');";
		//echo $sql;
		$db->exec($sql);
		$db->commit();
		$data['message'] = "Cadastrado com sucesso!";
	}
	catch(PDOException $e){
		$data['error'] = 1;
		$data['message'] = "Erro: " . $e->getMessage();
		$db->rollBack();
	}

	echo json_encode($data);
?>