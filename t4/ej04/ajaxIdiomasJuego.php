<?php
include('bdEtiquetas.php');
$idioma = isset($_REQUEST['idioma'])?$_REQUEST['idioma']:null;
echo "{$BDetiquetas[$idioma]['win']}#";
echo "{$BDetiquetas[$idioma]['introNum']}#";
echo "{$BDetiquetas[$idioma]['play']}#";
echo "{$BDetiquetas[$idioma]['yourNumber']}#";
echo "{$BDetiquetas[$idioma]['myNumber']}#";
echo "{$BDetiquetas[$idioma]['lower']}#";
echo "{$BDetiquetas[$idioma]['higher']}#";
echo "{$BDetiquetas[$idioma]['back']}";
?>