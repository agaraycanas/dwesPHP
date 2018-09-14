<?php
function listaDeFicheros() {
	$nombreFicheros = [ ];
	$ficheros = scandir ( 'textos' );
	foreach ( $ficheros as $f ) {
		if ($f != '.' && $f != '..') {
			array_push ( $nombreFicheros, substr ( $f, 0, - 4 ) );
		}
	}
	return $nombreFicheros;
}
function guardarTexto() {
	if (isset ( $_POST ['nombre'] ) && isset ( $_POST ['texto'] )) {
		$texto = $_POST ['texto'];
		$nombre = $_POST ['nombre'];
		file_put_contents ( 'textos/' . $nombre . '.txt', $texto );
		$_SESSION ['nombre'] = $nombre;
	}
}
function cambiarTexto() {
	if (isset ( $_POST ['nombreFicheroACargar'] )) {
		$_SESSION ['nombre'] = $_POST ['nombreFicheroACargar'];
	}
}
function obtenerTextoActual() {
	$texto = file_get_contents ( 'textos/' . $_SESSION ['nombre'] . '.txt' );
	return $texto;
}

// ==============================
session_start ();

guardarTexto (); // Sólo si es necesario
cambiarTexto (); // Sólo si es necesario
$ficheros = listaDeFicheros ();
if (! isset ( $_SESSION ['nombre'] ) || ! in_array ( $_SESSION ['nombre'], $ficheros )) {
	$_SESSION ['nombre'] = $ficheros [0];
}
$ficheroSeleccionado = $_SESSION ['nombre'];
$texto = obtenerTextoActual ();

?>

<head>
<script type="text/javascript">
		function cambiar(accion) {
			if (accion == 'letra') {
				document.getElementById('palabra').disabled=true;
				document.getElementById('form').action = 'letra.php';
			}
			else { //accion == 'palabra'
				document.getElementById('palabra').disabled=false;
				document.getElementById('form').action = 'resaltado.php';
			}
		}
	</script>
</head>
<body>
	<h3>Contenido del fichero</h3>
	<textarea cols="40" rows="20" readonly="readonly"><?= $texto ?></textarea>



	<form id="form" action="resaltado.php">
		<h4>Introduce algoritmo de resaltado</h4>
		Palabra
		<input type="radio" checked="checked" onchange="cambiar('palabra')" />
		Primera letra
		<input type="radio" onchange="cambiar('letra')" />
		<h4>Introduce la palabra que quieres resaltar</h4>
		<input type="text" id="palabra" name="palabra">

		<h4>Introduce modo de resaltado</h4>
		Color <select name="color">
			<option value="rojo">Rojo</option>
			<option value="azul">Azul</option>
			<option value="verde">Verde</option>
		</select><br /> Negrita
		<input type="checkbox" name="negrita">
		Subrayado
		<input type="checkbox" name="subrayar">

		<input type="hidden" name="fichero" value="<?= $ficheroSeleccionado?>">

		<input type="submit">
	</form>

	<hr />

	<form action="ej07.php" method="post">
		<h4>Introduce un nuevo texto para analizar</h4>
		<textarea rows="20" cols="40" name="texto"></textarea>

		<h4>Introduce un nombre para el texto (sin espacios)</h4>
		<input type="text" name="nombre" value="desconocido" />

		<input type="submit" value="Guardar" />
	</form>

	<hr />

	<form action="ej07.php" method="post">
		<h4>...o si lo prefieres, carga alguno de los anteriores</h4>
		<select name="nombreFicheroACargar">
		<?php foreach ($ficheros as $fichero): ?>
		<option value="<?=$fichero?>"
				<?= $fichero == $ficheroSeleccionado ? 'selected="selected"' : '' ?>>
			<?=$fichero?>
		</option>
			<?php endforeach;?>
	</select>

		<input type="submit" value="Cargar" />
	</form>

</body>