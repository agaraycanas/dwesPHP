<?php
session_start();
$nSumandos = isset($_GET['nSumandos']) ? $_GET['nSumandos'] : null;
$n = isset($_GET['n']) ? $_GET['n'] : null;

if ($nSumandos != null) {
    $_SESSION['nSumandos'] = $nSumandos;
    $_SESSION['paso'] = 1;
    $_SESSION['sumandos'] = [];
} else {
    $_SESSION['paso'] ++;
    $_SESSION['sumandos'][] = $n;

    if ($_SESSION['paso'] > $_SESSION['nSumandos']) {
        header('Location:tres.php');
    }
}
?>

<form>
	<h4>Introduce el sumando número <?=$_SESSION['paso']?>/<?=$_SESSION['nSumandos']?> (1..10)</h4>
	<input type="number" min="1" max="10" value="5" name="n" /> <br /> <input
		type="submit" />
</form>