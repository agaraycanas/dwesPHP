<?php require_once '/view/_templates/util/scripts.php';?>
<h2>NUEVO EMPLEADO</h2>
<form action="<?=UriParser::getBaseUri() ?>Empleado/crear" method="post">
	<label for="idNombre">Nombre</label>
	<input type="text" name="nombre" id="idNombre">
	<label for="idApellido">Apellido</label>
	<input type="text" name="apellido" id="idApellido">
	<label for="idFNac">Fecha de nacimiento</label>
	<input type="date" name="fnac" id="idFNac">
	<label for="ididdep">Departamento</label>
	<?= pintarSelect('iddep', $d['mainView']['listaDptos'])?>
	<br/>
	<input type="submit" value="Crear" class="button">
</form>