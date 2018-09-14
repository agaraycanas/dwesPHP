<?php 
$texto = file_get_contents('../ej01/articulo.txt');
?>

<h3>Contenido del fichero</h3>
<textarea cols="40" rows="20" readonly="readonly"><?= $texto ?></textarea>

<form action="resaltado.php">
	<h4>Introduce la palabra que quieres resaltar</h4>
	<input type="text" name="palabra">
	
	<h4>Introduce modo de resaltado</h4>
	Color
	<select name="color">
		<option value="rojo">Rojo</option>
		<option value="azul">Azul</option>
		<option value="verde">Verde</option>
	</select><br/>
	
	Negrita<input type="checkbox" name="negrita">
	Subrayado<input type="checkbox" name="subrayar">
	
	<input type="submit">
	
</form>
