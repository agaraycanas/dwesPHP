<?php 
session_start();
session_destroy();
?>
<form action="dos.php">
	Indica el número de sumandos (2..15)
	<input type="number" min="2" max="15" value="2" name="nMax"/><br/>
	<input type="submit"/>
</form>