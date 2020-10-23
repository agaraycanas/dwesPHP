<?php
session_start();

$suma = 0;

echo '<h2>';

foreach ($_SESSION['numeros'] as $k => $n) {
    echo $n . ($k === array_key_last($_SESSION['numeros']) ? '' : ' + ');
    $suma += $n;
}
echo ' = ' . $suma;
echo '<br/>';
echo '<a href="uno.php">Volver</a>';
echo '</h2>';

session_destroy();
?>