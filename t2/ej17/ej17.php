<form method="post" enctype="multipart/form-data" action="procesarFichero.php">
Escoge un fichero
<input type="file" name="miFichero"><br/>
Escoge una carpeta de destino
<?php include '../ej09/utilHTML.php';echo pintarSelect('tipo', ['t'=>'TEXTO','i'=>'IMAGEN'], ['i'], 'simple')?>
<input type="submit">
</form>

