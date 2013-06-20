<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
		
			$db->beginTransaction();
			
			$sql = "INSERT INTO camarim VALUES('". $_POST['camarim'] ."','". 
				$_POST['capacidade'] ."');";
			$db->exec($sql);
			
			$sql = "INSERT INTO atracao VALUES('". $_POST['dia'] ."','". 
				$_POST['ambiente'] ."','". 
				$_POST['banda'] ."','". 
				$_POST['posicao'] ."','".
				$_POST['camarim'] ."');";
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