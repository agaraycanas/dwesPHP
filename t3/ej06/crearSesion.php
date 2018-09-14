<?php
include ('Punto.php');

session_start ();
$_SESSION = [ ];

$entero = 8;
$real = 3.141592;
$texto = "En un lugar de La Mancha";
$semaforo =  ['r'=>'rojo', 'a'=>'amarillo','v'=>'verde'];
$fecha = date_create('2014-11-05');
$punto = new Punto(1,-8);

$_SESSION['entero']=$entero;
$_SESSION['real']=$real;
$_SESSION['texto']=$texto;
$_SESSION['fecha']=$fecha;
$_SESSION['semaforo']=$semaforo;
$_SESSION['punto']=$punto;

echo "DATOS REGISTRADOS en la SESION","<br/>".PHP_EOL;
echo "<a href=\"recuperarSesion.php\">Recuperar datos</a>";

?>