<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
	$data['error'] = 0;
	try{
	
		if (isset($_REQUEST['b'])){

			$db->beginTransaction();
			
			$sql = "UPDATE banda 
					SET nome='". $_POST['nome'] ."', 
						ano_de_formacao=".$_POST['ano_de_formacao'] .",
						estilo='".$_POST['estilo'] ."',
						site='".$_POST['site'] ."',
						empresario='".$_POST['documento'] ."'
					WHERE nome='". $_POST['nome'] ."'					
						;";
						
			$db->exec($sql);
			
			$db->commit();
			
			
			$db->beginTransaction();
			
			$sql = "UPDATE empresario 
					SET documento='". $_POST['documento'] ."', 
						nome='". $_POST['emp_nome'] ."', 
						sexo='".$_POST['emp_sexo'] ."',
						data_nasc='".$_POST['emp_data_nasc'] ."',
						email='".$_POST['emp_email'] ."',
						telefone='".$_POST['emp_telefone'] ."'
					WHERE documento='". $_POST['documento'] ."'					
						;";			
			$data['message'] = "Cadastrado com sucesso!";
			
		}else{
	
	
			$db->beginTransaction();
			
			$sql = "INSERT INTO empresario VALUES('". $_POST['documento'] ."','". 
				$_POST['emp_nome'] ."','". 
				$_POST['emp_sexo'] ."','". 
				$_POST['emp_data_nasc'] ."','".
				$_POST['emp_email'] ."','".
				$_POST['emp_telefone'] ."');";
			$db->exec($sql);
			
			$db->commit();
			
	
			$db->beginTransaction();
			
			$sql = "INSERT INTO banda VALUES('". $_POST['nome'] ."',". 
				$_POST['ano_de_formacao'] .",'". 
				$_POST['estilo'] ."','". 
				$_POST['site'] ."','".
				$_POST['documento'] ."');";
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