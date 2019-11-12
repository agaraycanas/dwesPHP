<h1>Añadir tarea</h1>

<form action="addTaskPost.php" method="post">

	Nombre de la tarea
	<input type="text" name="nombreTarea"/>
	<br />
	
	Empleado <select name="empleado">
		<option>Pepe</option>
		<option>Ana</option>
		<option>Juan</option>
	</select>
	<br />
	
	<input type="submit" value="Asignar">

</form>

<a href="menu.php">Volver</a>