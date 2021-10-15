<?php 
setcookie('sumandos');
setcookie('nSumandos');
setcookie('paso');
?>
<form action="dos.php">
	<p>Indica el número de sumandos (2..15)</p>
	
	<input type="number" min="2" max="15" value="3" name="nSumandos"/>
	<br/>
	
	<input type="submit"/>

</form>