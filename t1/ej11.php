<?php
$cadena = "Alberto:Garay:913334455//Ana:Garcia:914445566";
$personas = explode ( '//', $cadena );
foreach ( $personas as $persona ) {
	$datos = explode ( ':', $persona );
	echo '-------------------', PHP_EOL;
	echo 'Nombre: ',$datos[0], PHP_EOL;
	echo 'Apellido: ',$datos[1], PHP_EOL;
	echo 'Num.tlf: : ',$datos[2], PHP_EOL;
	echo '-------------------', PHP_EOL, PHP_EOL;
	
}
?>