<?php
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/database_init.php");
$IMPRIME_DIA = true;
require ($_SERVER["DOCUMENT_ROOT"]."/rockinriobd/php/dias.php");
try{
if(!isLoggedIn()){
	echo "<div class='alert alert-error'>Você deve estar logado para comprar ingressos!</div>";
}else if(isAdmin()){
	echo "<div class='alert alert-error'>Funcionários não podem comprar ingressos!</div>";
}else if(isset($_REQUEST['c'])){
	$data = $_REQUEST['c'];
	imprimeDia($data);
	
	echo "<legend>Dados do Usuário</legend>";
	
	$sql = "SELECT documento,nome,email,endereco,telefone,n_cartao,pne FROM Usuario JOIN Publico P ON P.usuario=documento WHERE documento='".$_SESSION['documento']."';";
	$result = $db->query($sql);
	if($result->rowCount() > 0){
		$dados = $result->fetch();			
		echo "<p>";
		echo "Nome: <b>".$dados['nome']."</b></br>";
		echo "Documento: <b>".$dados['documento']."</b></br>";
		echo "E-mail: <b>".$dados['email']."</b></br>";echo "Endereço: <b>".$dados['endereco']."</b></br>";
		echo "Telefone: <b>".$dados['telefone']."</b></br>";
		echo "Nº Cartão: <b>".$dados['n_cartao']."</b></br>";
		echo "Portador de Necessidades Especiais: <b>".ucfirst(strtolower($dados['pne']))."</b></br>";
		echo "</p>";
	}
	
	?>
	<form action="/rockinriobd/ingressos/" method="get" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Dados de Compra</legend>

<!-- Multiple Radios -->
<div class="control-group">
  <label class="control-label" for="tipo_ingresso">Tipo de Ingresso</label>
  <div class="controls">
    <label class="radio" for="tipo_ingresso-0">
      <input type="radio" name="tipo_ingresso" id="tipo_ingresso-0" value="MEIA" checked="checked">
      Meia Entrada - R$ 130,00
    </label>
    <label class="radio" for="tipo_ingresso-1">
      <input type="radio" name="tipo_ingresso" id="tipo_ingresso-1" value="INTEIRA">
      Entrada Inteira - R$ 260,00
    </label>
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <div class="controls">
    <button id="dia" value="<?php echo $data?>" name="dia" type="submit" class="btn btn-success">Comprar</button>
  </div>
</div>

</fieldset>
</form>

	<?php
}else if(isset($_REQUEST['tipo_ingresso']) && isset($_REQUEST['dia'])){
	$db->beginTransaction();
	$sql = "UPDATE Ingresso SET comprador='".$_SESSION['documento']."',tipo='".$_REQUEST['tipo_ingresso']."', data=current_date, hora=current_time 
			WHERE dia='".$_REQUEST['dia']."' AND numero=
			(SELECT numero FROM Ingresso 
				WHERE dia='".$_REQUEST['dia']."' AND comprador IS NULL ORDER BY numero LIMIT 1);";
	$db->exec($sql);
	$db->commit();
	echo "<div class='alert alert-success'>".$_SESSION['nome']." parabéns pela sua compra de ingresso para o dia ".$_REQUEST['dia']."!</div>";
}
}
catch(PDOException $e){
	echo "<div class='alert alert-error'>Erro: " . $e->getMessage()."</div>";
}

?>