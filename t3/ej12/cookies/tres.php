<?php 

function suma($sumandos) {
    $suma=0;
    foreach ($sumandos as $s) {
        $suma += $s;
    }
    return $suma;
}

$sumandos = isset($_COOKIE['sumandos']) ? unserialize($_COOKIE['sumandos']) : [];
?>

<h1>

<?php foreach ($sumandos as $k => $sumando): ?> 
    <?php $simbolo = ($k == sizeof($sumandos)-1) ? '=' : '+'; ?>
    <?= $sumando.$simbolo ?>
<?php endforeach;?>

<?= suma($sumandos)?>

</h1>
<a href="uno.php">Volver</a>


