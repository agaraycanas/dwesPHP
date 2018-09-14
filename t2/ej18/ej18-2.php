<form action="ej18-3.php">
<h4>Selecciona una opción</h4>
<?php
$nombres = [ 
		'Uno',
		'Dos',
		'Tres',
		'Cuatro',
		'Cinco',
		'Seis',
		'Siete',
		'Ocho',
		'Nueve',
		'Diez',
		'Once',
		'Doce',
		'Trece',
		'Catorce',
		'Quince'
];
for($i = 1; $i <= $_GET ['num']; $i ++) {
	echo "<input type=\"radio\" name=\"num\" value=\"$i\"";
	echo $i==1? " checked=\"checked\"" : '';
	echo "/> {$nombres[$i-1]} <br/> \n";

}
?>
<input type="submit">
</form>