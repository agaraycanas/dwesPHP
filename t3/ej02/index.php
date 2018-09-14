<?php
$nVisitas = isset ( $_COOKIE ['nVisitas'] ) ? $_COOKIE ['nVisitas'] : 0;
$primeraVez = ($nVisitas == 0);

if ($primeraVez) {
	setcookie ( "nVisitas", 1 );
	echo "<h1>BIENVENIDO</h1>";
} else {
	setcookie ( "nVisitas", $nVisitas + 1 );
	echo "Hola. Es la vez n&uacute;mero $nVisitas que visitas esta p&aacute;gina";
}
?>
