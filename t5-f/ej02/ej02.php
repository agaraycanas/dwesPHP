<?php 
$texto = file_get_contents('../ej01/articulo.txt');
?>

<h3>Contenido del fichero</h3>
<textarea cols="40" rows="20" readonly="readonly"><?= $texto ?></textarea>
