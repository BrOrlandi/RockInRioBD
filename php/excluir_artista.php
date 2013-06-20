<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
			$db->beginTransaction();
			
			$sql = "DELETE FROM artista WHERE 
				documento='".$_REQUEST['a']."';";
				
			$db->exec($sql);
			
			$db->commit();

			
			$data['message'] = "Excluido com sucesso!";
   		
		
	}
	catch(PDOException $e){
		$data['error'] = 1;
		$data['message'] = "Erro: " . $e->getMessage();
		$db->rollBack();
	}

	echo json_encode($data);
?>