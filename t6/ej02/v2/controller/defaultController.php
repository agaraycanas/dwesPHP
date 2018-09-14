<?php
$controlador=isset($_GET['controlador'])?$_GET['controlador']:'home';

switch ($controlador) {
	case 'home': header('Location:homeController.php');break;
	case 'saludo':header('Location:saludoController.php') ;break;

}
?>