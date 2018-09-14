<?php include ("../ej09/utilHTML.php"); ?>

<form>
	<?= pintarSelect('deporte',	['T'=>'Tenis','F'=>'Fútbol','B'=>'Baloncesto','P'=>'Petanca'],['T'],'simple'); ?>
	<input type="submit">
</form>
