<?php
$ok = isset ( $_REQUEST ['ok'] ) && $_REQUEST ['ok'] == "1" ? true : false;
if ($ok) {
	$mensaje = "EMPLEADO ACTUALIZADO";
} else {
	$mensaje = "ERROR: Error al actualizar empleado";
}
echo <<<HTML
<head>
<meta charset="utf-8">
</head>

<body>
	<h2>$mensaje</h2>
	<form action="index.php">
		<input type="submit" value="Menú principal">
	</form>
</body>
HTML;
?>
