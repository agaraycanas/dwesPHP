<?php
include('bdEtiquetas.php');
$idioma = isset($_REQUEST['idioma'])?$_REQUEST['idioma']:null;
echo "{$BDetiquetas[$idioma]['user']}#{$BDetiquetas[$idioma]['pwd']}#{$BDetiquetas[$idioma]['login']}";
?>