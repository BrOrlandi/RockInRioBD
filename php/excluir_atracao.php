<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
			$db->beginTransaction();
			
			$sql = "DELETE FROM atracao WHERE 
				dia='".$_REQUEST['d']."' AND
				ambiente='".$_REQUEST['a']."' AND
				banda = '".$_REQUEST['b']."';";
				
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