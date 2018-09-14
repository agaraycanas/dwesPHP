<?php
$ok = isset ( $_REQUEST ['ok'] ) && $_REQUEST ['ok'] == "1" ? true : false;
if ($ok) {
	echo "EMPLEADO INSERTADO";
} else {
	echo "ERROR: Empleado no insertado";
}
?>
<head>
<meta charset="utf-8">
</head>

<body>
	<form action="index.php">
		<input type="submit" value="Menú principal">
	</form>
</body>