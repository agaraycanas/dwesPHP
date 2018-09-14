<?php
include ('util.php');

// ---------------_FUNCIONES------------------
function datosEmpleado($numemp) {
	global $bd;
	$query = <<<HTML
		select * from EMPLEADOS
		where numemp = :numemp
HTML;
	$sentencia = $bd->prepare ( $query );
	$sentencia->bindParam ( ':numemp', $numemp );
	$sentencia->execute ();
	return $sentencia->fetchAll ();
}

// ---------------COMIENZO------------------

$bd = conectarMySql (  );

$accion = isset ( $_REQUEST ['accion'] ) && ! empty ( $_REQUEST ['accion'] ) ? $_REQUEST ['accion'] : 'Ninguna';
$numemp = isset ( $_REQUEST ['numemp'] ) && ! empty ( $_REQUEST ['numemp'] ) ? $_REQUEST ['numemp'] : null;

if ($accion == 'Ninguna' || $numemp == null) {
	header ( 'Location:index.php' );
} else {
	$mensaje = $accion == 'R' ? 'Consulta' : 'Edición';
	echo <<<HTML
	<head>
		<meta charset="utf-8">
	</head>

	<body>
		<h2>$mensaje de empleados</h2>
		<fieldset><legend>Datos del empleado</legend>
HTML;
	$datosEmpleado = datosEmpleado ( $numemp );
	$activo = $accion == 'R' ? 'readonly="readonly"' : '';
	if ($datosEmpleado != [ ]) {
		echo <<<HTML

		<form action="empleadoUpost.php" method="post">
		
HTML;
		foreach ( $datosEmpleado as $emp ) {
			echo <<<HTML
			
			Num.emp <input type="text" name="numemp" value="{$emp['numemp']}" readonly="readonly"> <br/>
			Nombre <input type="text" name="nombre" value="{$emp['nombre']}" $activo> <br/>
			Apellido <input type="text" name="apellido" value="{$emp['apellido']}" $activo> <br/>
			Teléfono <input type="text" name="telefono" value="{$emp['telefono']}" $activo> <br/>
HTML;
			$selHombre = $emp ['sexo'] == 'hombre' ? 'selected="selected"' : '';
			$selMujer = $emp ['sexo'] == 'mujer' ? 'selected="selected"' : '';
			$activo = $accion == 'R' ? 'disabled="disabled"' : '';
			
			echo <<<HTML
			
			Sexo <select name="sexo" $activo>
				<option value="hombre" $selHombre>Hombre</option>
				<option value="mujer" $selMujer>Mujer</option>
			</select><br/>
HTML;
		}
		if ($accion=='U') {
		echo <<<HTML
			<input type="submit" value="Actualizar">
HTML;
		}
		echo <<<HTML
			</form>
			</fieldset>
HTML;
	} else {
		echo "<h3> No existe el empleado número $numemp</h3>";
	}
	
	echo <<<HTML
		<form action="index.php">
			<input type="submit" value="Menú principal">
		</form>
	</body>

HTML;
}
?>