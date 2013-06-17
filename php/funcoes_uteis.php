<?php

function converterDiaSemana($dia){
	switch($dia){
		case '0':
			$diaSemana = 'DOMINGO';
			break;
		case '1':
			$diaSemana = 'SEGUNDA';
			break; 
		case '2':
			$diaSemana = 'TERÇA';
			break; 
		case '3':
			$diaSemana = 'QUARTA';
			break; 
		case '4':
			$diaSemana = 'QUINTA';
			break; 
		case '5':
			$diaSemana = 'SEXTA';
			break; 
		case '6':
			$diaSemana = 'SÁBADO';
			break; 
		default:
			$diaSemana = '';
			break; 
	}
	return $diaSemana;
}

?>