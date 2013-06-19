<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
		if (isset($_REQUEST['m'])){
		
			$db->beginTransaction();
		
			$sql = "DELETE FROM membro 
					WHERE documento='".$_REQUEST['m']."'					
					;";
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