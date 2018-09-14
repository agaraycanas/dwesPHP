<?php
include ("../ej09/utilHTML.php");
echo "<form>";

echo 
pintarRadio(
'nombre',
[
'Joseph'=>'Pepe',
'John'=>'Juan',
'Manuel-she'=>'Manuela',
],
'Manuel-she');

echo '<input type="submit">';
echo "</form>";

?>