<?php
?>
<head>
<meta charset="utf-8">
</head>
<body>
	<h1>CRUD de EMPLEADOS</h1>
	<fieldset>
		<legend>Selecciona operación </legend>
		<form action="empleadoC.php">
			<input type="submit" value="Crear">
		</form>
		<form action="empleadoIntroNumEmp.php">
			<input type="submit" value="Recuperar">
			<input type="hidden" name="accion" value="R">
		</form>
		<form action="empleadoIntroNumEmp.php">
			<input type="submit" value="Editar">
			<input type="hidden" name="accion" value="U">
		</form>
		<form action="empleadoIntroNumEmp.php">
			<input type="submit" value="Borrar">
			<input type="hidden" name="accion" value="D">
		</form>
	</fieldset>
</body>