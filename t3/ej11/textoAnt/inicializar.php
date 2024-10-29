<?php
require_once('util.php');
session_start();
$_SESSION['yo'] = [];
$_SESSION['baraja'] = inicializarMazo();
$_SESSION['total'] = 0;
$_SESSION['gm'] = 0;
$_SESSION['gb'] = 0;

header('Location:tablero.php');
?>