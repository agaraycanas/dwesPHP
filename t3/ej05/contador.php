<?php

ini_set ( 'session.use_trans_sid', '1' );
ini_set ( 'session.use_cookies', '0' );
ini_set ( 'session.use_only_cookies', '0' );


session_start ();
if (isset ( $_SESSION ['nVisitas'] )) {
	$_SESSION ['nVisitas'] = $_SESSION ['nVisitas'] + 1;
} else {
	$_SESSION ['nVisitas'] = 1;
}

echo <<<FORM
<h1>Visitas: {$_SESSION['nVisitas']}</h1>
<form action="contador.php" method="get">
	<input type="submit">
</form>
FORM;
?>


