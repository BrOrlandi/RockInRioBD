<?php
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
$IMPRIME_DIA = true;
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/dias.php");

if(!isset($_REQUEST['c'])){
}
else if(!isLoggedIn()){
	echo "<div class='alert alert-error'>Você deve estar logado para comprar ingressos!</div>";
}else{
	$data = $_REQUEST['c'];
	imprimeDia($data);
	
	
	
	?>
	<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Dados de Compra</legend>

<!-- Multiple Radios -->
<div class="control-group">
  <label class="control-label" for="tipo_ingresso">Tipo de Ingresso</label>
  <div class="controls">
    <label class="radio" for="tipo_ingresso-0">
      <input type="radio" name="tipo_ingresso" id="tipo_ingresso-0" value="Meia Entrada - R$ 130,00" checked="checked">
      Meia Entrada - R$ 130,00
    </label>
    <label class="radio" for="tipo_ingresso-1">
      <input type="radio" name="tipo_ingresso" id="tipo_ingresso-1" value="Entrada Inteira - R$ 260,00">
      Entrada Inteira - R$ 260,00
    </label>
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="br_comprar"></label>
  <div class="controls">
    <button id="br_comprar" name="br_comprar" class="btn btn-success">Comprar</button>
    <button id="bt-cancelar" name="bt-cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>

	<?php
	
}
?>