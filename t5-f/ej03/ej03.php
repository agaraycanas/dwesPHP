<?php 
$texto = file_get_contents('../ej01/articulo.txt');
?>

<h3>Contenido del fichero</h3>
<textarea cols="40" rows="20" readonly="readonly"><?= $texto ?></textarea>

<h4>Introduce la palabra que quieres resaltar</h4>
<form action="resaltado.php">
	<input type="text" name="palabra">
	<input type="submit">
</form>
