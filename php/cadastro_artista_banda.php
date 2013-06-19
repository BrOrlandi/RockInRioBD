<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	

			$db->beginTransaction();
			
			$sql = "INSERT INTO Banda_Artista VALUES('". $_POST['banda'] ."','". 
			$_POST['artista'] ."','". 
			$_POST['func'] ."');";
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