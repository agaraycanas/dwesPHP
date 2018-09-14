<?php
include("../util.php");
// Habría que protegerlo contra ejecuciones no AJAX
$idioma = isset ( $_REQUEST ['idioma'] ) ? $_REQUEST ['idioma'] : 'ES';
$etiquetas = $BDetiquetas[$idioma];
echo implode('#',$etiquetas);
?>