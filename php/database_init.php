<?php

	$db = new PDO("pgsql:dbname=RockInRioDB;host=localhost","rockinrio","rir2013");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	if($db == false)
	{
		echo "Não conectado database.";
	}
?>
