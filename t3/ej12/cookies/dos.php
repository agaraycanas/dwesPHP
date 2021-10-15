<?php
$nSumandos = isset($_GET['nSumandos']) ? $_GET['nSumandos'] : $_COOKIE['nSumandos'];
$n = isset($_GET['n']) ? $_GET['n'] : null;
$paso = isset($_COOKIE['paso'])? $_COOKIE['paso'] : 1;

if ($n == null) {
    setcookie('nSumandos',$nSumandos);
    setcookie('paso',2);
    setcookie('sumandos',serialize([]));
} else {
    setcookie('paso',$paso+1);
    $sumandos = unserialize($_COOKIE['sumandos']);
    $sumandos[] = $n;
    setcookie('sumandos',serialize($sumandos));

    if ($_COOKIE['paso'] > $_COOKIE['nSumandos']) {
        header('Location:tres.php');
    }
}
?>

<form>
	<h4>Introduce el sumando número <?=$paso?>/<?=$nSumandos?> (1..10)</h4>
	<input type="number" min="1" max="10" value="5" name="n" /> <br /> <input
		type="submit" />
</form>