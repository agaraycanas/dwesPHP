<?php
include ('util.php');
include ('../../t2/ej09/utilHTML.php');

session_start ();

if (isset($_REQUEST['submitFase1'])) { //Venimos de grabar datos de la fase anterior
	$_SESSION ['nombre'] = isset ( $_REQUEST ['nombre'] ) ? $_REQUEST ['nombre']:null;
	$_SESSION ['apellido'] = isset ( $_REQUEST ['apellido'] ) ? $_REQUEST ['apellido'] : null;
	$_SESSION ['fNac'] = isset ( $_REQUEST ['fNac'] ) ? $_REQUEST ['fNac'] : null;
	$_SESSION ['genero'] = isset ( $_REQUEST ['genero'] ) ? $_REQUEST ['genero'] : null;
	$_SESSION ['casado'] = isset ( $_REQUEST ['casado'] ) ? $_REQUEST ['casado'] : null;
	$_SESSION ['hijos'] = isset ( $_REQUEST ['hijos'] ) ? $_REQUEST ['hijos'] : null;
	$_SESSION ['nacionalidades'] = isset ( $_REQUEST ['nacionalidades'] ) ? $_REQUEST ['nacionalidades'] : [];
}

$salario = isset ( $_SESSION ['salario'] ) ? $_SESSION ['salario'] : 0;
$comentarios = isset ( $_SESSION ['comentarios'] ) ? $_SESSION ['comentarios'] : '';
$departamento = isset ( $_SESSION ['departamento'] ) ? $_SESSION ['departamento'] : 'mar';
echo pintarBarraNavegacion ( 2 );

echo <<<OUT

PASO 2
<form action="paso3.php">
<fieldset>
<legend><b>Datos profesionales</b></legend> 
OUT;

pintarSelect ( 'departamento', $BDdptos, [$departamento], 'simple' );

echo <<<OUT
<br/>

<label for="idSalario">Salario</label>
<input type="text" id="idSalario" name="salario" value="$salario"><br/>

<label for="idComentarios">Comentarios</label>
<textarea id="idComentarios" rows="20" cols="20" name="comentarios">$comentarios</textarea></br>	
<input type="submit" name="submitFase2" value="Grabar informaci&oacute;n paso 2 e ir al Paso 3 - Datos bancarios">
</form>
OUT;
?>

