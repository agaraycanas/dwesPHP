<?php
?>
<head>
<meta charset="utf-8">
</head>

<body>
	<h2>Nuevo empleado</h2>
	<fieldset>
		<legend>Introduce los datos</legend>
		<form action="empleadoCpost.php" method="post">
			<label for="idNumemp">Número de empleado</label>
			<input type="text" name="numemp" id="idNumemp"><br/>

			<label for="idNombre">Nombre</label>
			<input type="text" name="nombre" id="idNombre"><br/>

			<label for="idApellido">Apellido</label>
			<input type="text" name="apellido" id="idApellido"><br/>

			<label for="idTelefono">Teléfono</label>
			<input type="text" name="telefono" id="idTelefono"><br/>

			<label for="idSexo">Sexo</label>
			<select name="sexo" id="idSexo">
				<option value="hombre">Hombre</option>
				<option value="mujer">Mujer</option>
			</select><br/>
			
			<input type="submit" value="Crear">
		</form>
	</fieldset>
	<form action="index.php">
		<input type="submit" value="Menú principal">
	</form>
</body>