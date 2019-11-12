<?php
require_once('Carta.php');

session_start();
$posicionNuevaCarta = rand(0,sizeof($_SESSION['baraja'])-1);
$_SESSION['yo'][] = $_SESSION['baraja'][$posicionNuevaCarta];
unset($_SESSION['baraja'][$posicionNuevaCarta]);
$_SESSION['baraja'] = array_values($_SESSION['baraja']);

$_SESSION['total'] += ($_SESSION['yo'][sizeof($_SESSION['yo'])-1])->valor;

$status = 'sigo';

if ($_SESSION['total']>7.5) { // PIERDO (me pasé)
    $status = 'pierdo';
}
else if ($_SESSION['total']==7.5)  { // GANO (7 y media)
    $status = 'gano';
}

header('Location:tablero.php?status='.$status);

?>
