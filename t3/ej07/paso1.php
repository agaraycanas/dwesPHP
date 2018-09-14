<?php
include ('util.php');
include ('../../t2/ej09/utilHTML.php');

session_start();

if (isset($_REQUEST['limpiar'])) { // Limpiar SESSION
	session_unset();
	session_destroy();	
}

$nombre = isset($_SESSION['nombre'])?$_SESSION['nombre']:'';
$apellidos = isset($_SESSION['apellido'])?$_SESSION['apellido']:'';
$fNac = isset($_SESSION['fNac'])?$_SESSION['fNac']:'';
$genero = isset($_SESSION['genero'])?$_SESSION['genero']:'m';;
$casado = isset($_SESSION['casado'])?true:false;
$casado = ($casado ? 'checked="checked"' : '');
$hijos= isset($_SESSION['hijos'])?true:false;
$hijos= ($hijos ? 'checked="checked"' : '');
$nacionalidades = isset($_SESSION['nacionalidades'])?$_SESSION['nacionalidades']:['es'];

echo pintarBarraNavegacion ( 1 );

echo <<<OUT
<form action="paso2.php">
<fieldset>
<legend><b>Datos personales</b></legend>

<label for="idNombre">Nombre</label>
<input type="text" id="idNombre" name="nombre" value="$nombre">
		
<label for="idApe">Apellidos</label>
<input type="text" id="idApe" name="apellido" value="$apellidos"><br/>
		
<label for="idfNac">Fecha de nacimiento</label>
<input type="date" id="idfNac" name="fNac" value="$fNac"><br/>

G&eacute;nero<br/>
OUT;

echo pintarRadio ( 'genero', $BDgeneros, $genero );

echo <<<OUT
<label for="idEstadoCivil">Casado o emparejado?</label>
<input type="checkbox" id="idCasado" name="casado" $casado><br/>

<label for="idHijos">Hijos?</label>
<input type="checkbox" id="idHijos" name="hijos" $hijos><br/>
OUT;

echo pintarSelect ( 'nacionalidades', $BDnacionalidades, $nacionalidades, 'multiple' );

echo <<<OUT
<br/>
<input type="submit" name="submitFase1" value="Grabar informaci&oacute;n paso 1 e ir al Paso 2 - Datos profesionales">

</fieldset>
</form>
OUT;
?>

