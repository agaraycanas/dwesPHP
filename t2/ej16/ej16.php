<?php
$nombre = $_FILES ['ficheroASubir'] ['name'];
$carpetaDestino = "./files/"; // Debe tener “apache” permiso de escritura en ella
copy ( $_FILES ['ficheroASubir'] ['tmp_name'], $carpetaDestino . $_POST ['carpeta'] . '/' . $nombre );
echo "El fichero $nombre se almacen&oacute; en {$_POST['carpeta']}";

?>