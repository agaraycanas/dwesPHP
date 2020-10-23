<?php 
setcookie('nMax');
setcookie('n');
setcookie('numeros');
?>
<form action="dos.php">
	Indica el número de sumandos (2..15)
	<input type="number" min="2" max="15" value="2" name="n"/><br/>
	<input type="submit"/>
</form>