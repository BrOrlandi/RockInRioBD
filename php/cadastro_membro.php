<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
		if (isset($_REQUEST['m'])){
		
			$db->beginTransaction();
		
			$sql = "UPDATE membro 
					SET nome='".$_POST['nome'] ."',
						sexo='".$_POST['sexo'] ."',
						data_nasc='".$_POST['data_nascimento'] ."',
						funcao='".$_POST['funcao'] ."'
					WHERE documento='". $_POST['documento'] ."'					
					;";
			$db->exec($sql);
				
			$db->commit();	
				
		} else{
		
			$db->beginTransaction();
				
			$sql = "INSERT INTO membro VALUES('". $_POST['documento'] ."','". 
					$_POST['nome'] ."','". 
					$_POST['sexo'] ."','". 
					$_POST['data_nascimento'] ."','".
					$_POST['funcao'] ."','".
					$_POST['banda'] ."');";
			$db->exec($sql);
				
			$db->commit();
			
   		}
		
	}
	catch(PDOException $e){
		$data['error'] = 1;
		$data['message'] = "Erro: " . $e->getMessage();
		$db->rollBack();
	}

	echo json_encode($data);
?>