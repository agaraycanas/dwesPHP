<?php
include ('Punto.php');
session_start();

$entero= $_SESSION['entero'];
$real= $_SESSION['real'];
$texto= $_SESSION['texto'];
$semaforo = $_SESSION['semaforo'];
$fecha = $_SESSION['fecha'];
$punto = $_SESSION['punto'];

echo <<<DATOS
<h3>Entero: $entero</h3><br/>
<h3>Real: $real</h3><br/>
<h3>Texto: $texto</h3><br/>
DATOS;
echo '<h3>Semaforo: ',print_r($semaforo),'</h3><br/>';
echo '<h3>Fecha: ',print_r($fecha),'</h3><br/>';
echo '<h3>Punto: (',$punto->getX(),',',$punto->getY(),')</h3><br/>';

?>