<?php

	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$error = null;
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
		//echo $sql;
		$db->prepare($sql);
		$db->exec($sql);
		
		$sql = "INSERT INTO Publico VALUES('". $_POST['documento'] ."','". 
			$_POST['cartao'] ."','". 
			$_POST['pne'] ."');";
		//echo $sql;
		$db->prepare($sql);
		$db->exec($sql);
		
		
		$db->commit();
	}
	catch(PDOException $e){
		$error = "Erro: " . $e->getMessage();
		$db->rollBack();
	}

	echo $error;
?>