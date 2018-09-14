<?php
$accion=isset($_REQUEST['accion']) && ! empty ( $_REQUEST ['accion'] ) ? $_REQUEST ['accion'] : 'Ninguna';
if ($accion=='Ninguna') {
	header('Location:index.php');
}
else {
	switch ($accion) {
		case 'R':$mensaje='consultar';break;
		case 'U':$mensaje='editar';break;
		case 'D':$mensaje='borrar';break;
	}
	$script = $accion=='D'?"empleadoDpost.php":"empleadoRUpost.php";
}

echo <<<HTML
<head>
<meta charset="utf-8">
</head>

<body>
	<fieldset>
		<legend>Introduce el número de empleado a $mensaje</legend>
		<form action="$script" method="post">
			<label for="idNumemp">Número de empleado</label>
			<input type="text" name="numemp">
HTML;
$mensaje=ucwords($mensaje); // Primera letra mays.
echo <<<HTML
			<button type="submit" name="accion" value="$accion">$mensaje</button>		
		</form>
		<form action="index.php">
			<input type="submit" value="Menú principal">
		</form>
	</fieldset>
</body>
HTML;
?>