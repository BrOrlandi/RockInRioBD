<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
		if (isset($_REQUEST['m'])){
		
			$db->beginTransaction();
		
			$sql = "UPDATE Musica 
					SET duracao='".$_REQUEST['duracao'] ."',
						posicao='".$_REQUEST['posicao'] ."'
					WHERE titulo='". $_REQUEST['m'] ."'	
					AND banda='".$_REQUEST['banda']."'
					;";
			$db->exec($sql);
				
			$db->commit();	
				
		} else{
		
			$db->beginTransaction();
				
			$sql = "INSERT INTO musica VALUES('". $_POST['banda'] ."','". 
					$_POST['titulo'] ."','". 
					$_POST['duracao'] ."','". 
					$_POST['posicao'] ."');";
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