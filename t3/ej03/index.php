<?php
echo '<h4>' . pathinfo($_SERVER['REQUEST_URI'])['dirname'] . '</h4>';
?>
<h2>Listado de cookies por nivel</h2>
Nivel 0 -->
<a href="visualizarCookies.php">Listado de cookies</a>
<br />
Nivel 0 --> Nivel 1 -->
<a href="uno/visualizarCookies.php">Listado de cookies</a>
<br />
Nivel 0 --> Nivel 1 --> Nivel 2 -->
<a href="uno/dos/visualizarCookies.php">Listado de cookies</a>
<br />
<h2>Creaci&oacute;n de cookies en diferentes niveles (directorios) por
	un script ubicado en /</h2>

<h3>Se permite crear nombre y contenido de la cookie, as&iacute; como el
	nivel</h3>

<form action="ubicarCookie.php">
	<fieldset>
		<legend>Creaci&oacute;n de cookie</legend>

		<label for="nombre">Nombre cookie</label>
		<input type="text" id="nombre" name="nombre">

		<label for="contenido">Contenido cookie</label>
		<input type="text" id="contenido" name="contenido">
		<br /> <label for="nivel">Nivel</label> <select id="nivel"
			name="nivel">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
		</select>

		<input type="submit">

	</fieldset>
</form>

