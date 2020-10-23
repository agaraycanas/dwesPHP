<?php

if (!isset($_COOKIE['numeros'])) {
    echo '<h1>ERROR</h1>';
}
else {
    $ns = ltrim($_COOKIE['numeros'],'-');
    $ns = rtrim($ns,'-');
    $ns = explode('-',$ns);
    $akns = array_keys($ns);
    $suma = 0;
    echo '<h2>';
    foreach ($ns as $k => $n) {
        echo $n . ($k === end($akns) ? '' :' + ');
        $suma += $n;
    }
    echo ' = ' . $suma;
    echo '<br/>';
    echo '<a href="uno.php">Volver</a>';
    echo '</h2>';
}
?>