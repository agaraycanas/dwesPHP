<?php
include ('util.php');

function listaNacionalidades($nacionalidades) {
	global $BDnacionalidades;
	$sol='';
	foreach ($nacionalidades as $n) {
		$sol .= (($BDnacionalidades[$n]).' ');
		//$sol .= ($n.' ');
	} 
	return $sol;	
}


session_start();

if (isset($_REQUEST['submitFase3'])) { //Venimos de grabar datos de la fase anterior
	$_SESSION['cc'] = isset($_REQUEST['cc'])?$_REQUEST['cc']:0;
}

$nombre=isset($_SESSION['nombre'])?$_SESSION['nombre']:'Nombre no definido';
$apellido=isset($_SESSION['apellido'])?$_SESSION['apellido']:'Apellido no definido';;
$fnac=isset($_SESSION['fNac'])?$_SESSION['fNac']:'Fecha no definida';
$genero = isset($_SESSION['genero'])?$_SESSION['genero']:null;
$genero = $genero==null?'G�nero no definido':$BDgeneros[$genero];
$casado=isset($_SESSION['casado'])?'S�':'No';
$hijos=isset($_SESSION['hijos'])?'S�':'No';
$nacionalidades=isset($_SESSION['nacionalidades'])?$_SESSION['nacionalidades']:[];
$sNacionalidades = listaNacionalidades($nacionalidades);

$dpto=isset($_SESSION['departamento'])?$_SESSION['departamento']:null;
$dpto=$dpto==null?'Departamento no derfinido':$BDdptos[$dpto];
$salario=isset($_SESSION['salario'])?$_SESSION['salario']:'Salario no definido';
$comentarios=isset($_SESSION['comentarios'])?$_SESSION['comentarios']:'Comentarios no definidos';

$cc = isset($_SESSION['cc'])?$_SESSION['cc']:null;

echo pintarBarraNavegacion(4);


echo "RESUMEN";
echo <<<OUT
<fieldset>
<legend><b>Datos personales</b></legend>
<b>Nombre: </b> $nombre
<br/><b>Apellido: </b> $apellido
<br/><b>Fecha de nacimiento: </b> $fnac
<br/><b>G�nero: </b> $genero
<br/><b>�Est� casado? </b> $casado
<br/><b>�Tiene hijos? </b> $hijos
<br/><b>Nacionalidades: </b> $sNacionalidades
</fieldset>

<fieldset>
<legend><b>Datos profesionales</b></legend>
<b>Departamento: </b> $dpto
<br/><b>Salario: </b> $salario
<br/><b>Comentarios: </b> $comentarios
</fieldset>

<fieldset>
<legend><b>Datos bancarios</b></legend>
<b>Cuenta corriente: </b> $cc
</fieldset>

<form action="paso1.php">
<input type="submit" name="limpiar" value="Volver al paso 1 y limpiar">
</form>
OUT;
?>