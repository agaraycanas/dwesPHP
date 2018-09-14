<?php 
include ('util.php');

session_start();
if (isset($_REQUEST['submitFase2'])) { //Venimos de grabar datos de la fase anterior
	$_SESSION['departamento'] = isset($_REQUEST['departamento'])?$_REQUEST['departamento']:null;
	$_SESSION['salario'] = isset($_REQUEST['salario'])?$_REQUEST['salario']:null;
	$_SESSION['comentarios'] = isset($_REQUEST['comentarios'])?$_REQUEST['comentarios']:null;
}
$cc=isset($_SESSION['cc'])?$_SESSION['cc']:0;
echo pintarBarraNavegacion(3);

echo <<<FORM3
PASO 3
<form action="paso4.php">
<fieldset>
<legend><b>Datos bancarios</b></legend> 
<label for="idcc">Cuenta corriente</label>
<input type="text" id="idcc" name="cc" value="$cc"><br/>
		
<input type="submit" name="submitFase3" value="Grabar informaci&oacute;n paso 3 e ir al resumen final">
</form>
FORM3;
?>