<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
		if (isset($_REQUEST['a'])){

			$db->beginTransaction();
			
			$sql = "UPDATE Artista 
					SET documento='". $_POST['documento'] ."', 
						nome='".$_POST['nome'] ."',
						sexo='".$_POST['sexo'] ."',
						data_nasc='".$_POST['data_nascimento'] ."',
						nome_artistico='".$_POST['nome_artistico'] ."'
					WHERE documento='". $_POST['documento'] ."'					
						;";
						
			$db->exec($sql);
			
			$db->commit();
			
			$data['message'] = "Cadastrado com sucesso!";
		}else{
	
			$db->beginTransaction();
			
			$sql = "INSERT INTO Artista VALUES('". $_POST['documento'] ."','". 
				$_POST['nome'] ."','". 
				$_POST['sexo'] ."','". 
				$_POST['data_nascimento'] ."','".
				$_POST['nome_artistico'] ."');";
			$db->exec($sql);
			
			$db->commit();
			$db->beginTransaction();
			
			$sql = "INSERT INTO Banda_Artista VALUES('". $_POST['banda0'] ."','". 
			$_POST['documento'] ."','". 
			$_POST['func0'] ."');";
			$db->exec($sql);
				
			$db->commit();
			$data['message'] = "Cadastrado com sucesso!";
		}
   		
		
	}
	catch(PDOException $e){
		$data['error'] = 1;
		$data['message'] = "Erro: " . $e->getMessage();
		$db->rollBack();
	}

	echo json_encode($data);
?>