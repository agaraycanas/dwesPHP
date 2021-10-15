<?php
$nSumandos =    isset($_GET['nSumandos']) ? $_GET['nSumandos'] : null;
$n =            isset($_GET['n']) ? $_GET['n'] : null;
$paso =         isset($_GET['paso']) ? $_GET['paso'] : 1;
$sumandos =     isset($_GET['sumandos']) ?  unserialize($_GET['sumandos']) : [];

if ($n != null) {
    $sumandos[] = $n;

    if ($paso > $nSumandos) {
        header('Location:tres.php?sumandos='.serialize($sumandos));
    }
}
?>

<form>
	<h4>Introduce el sumando número <?=$paso?>/<?=$nSumandos?> (1..10)</h4>
	<input type="number" min="1" max="10" value="5" name="n" /> <br />
	<input type="hidden" name="nSumandos" value="<?=$nSumandos?>" />
	<input type="hidden" name="paso" value="<?=$paso+1?>" />
	<input type="hidden" name="sumandos" value='<?=serialize($sumandos)?>' />
	
	<input type="submit" />
</form>