<?php
require_once('Carta.php');

session_start();
$puntuacionBanca = 0;
$status = 'seguir';

while ($status == 'seguir') {
    $posicionNuevaCarta = rand(0,sizeof($_SESSION['baraja'])-1);
    $_SESSION['banca'][] = $_SESSION['baraja'][$posicionNuevaCarta];
    unset($_SESSION['baraja'][$posicionNuevaCarta]);
    $_SESSION['baraja'] = array_values($_SESSION['baraja']);
    $puntuacionBanca += ($_SESSION['banca'][sizeof($_SESSION['banca'])-1])->valor;

    if ($puntuacionBanca > 7.5) { 
        $status = 'gano';
    }
    else if ($puntuacionBanca > $_SESSION['total'] || $puntuacionBanca == 7.5 )  { 
        $status = 'pierdo';
    }
    $_SESSION['puntuacionBanca'] = $puntuacionBanca;
}

header('Location:tablero.php?status='.$status);

?>
