<?php
require_once('../util.php');
session_start();
$_SESSION['yo'] = [];
$_SESSION['banca'] = [];
$_SESSION['baraja'] = inicializarMazo();
$_SESSION['total'] = 0;
$_SESSION['ganoYo'] = 0;
$_SESSION['ganaBanca'] = 0;

header('Location:tablero.php');
?>