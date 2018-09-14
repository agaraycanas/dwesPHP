<?php
include ("../ej09/utilHTML.php");
echo "<form>";

echo 
pintarCheckboxes(
	'aficion',
	[	
	'T'=>'Tenis', 
	'F'=>'Fútbol',
	'B'=>'Baloncesto',
	'P'=>'Petanca'
	],
	['T','F','B','P']
	);

echo '<input type="submit">';
echo "</form>";

?>