<?php
echo 'Nombre? ';
fscanf ( STDIN, "%s\n", $nombre );

while ( $nombre != 'fin' ) {
	echo "Edad de $nombre? ";
	fscanf ( STDIN, "%d\n", $edad );
	$persona [$nombre] = $edad;
	echo 'Nombre? ';
	fscanf ( STDIN, "%s\n", $nombre );
}

// ksort($persona); //Para ordenar por nombre de persona
// asort ( $persona ); //Para ordenar por edad

foreach ( $persona as $nombre => $edad ) {
	echo "$nombre($edad),";
}

?>