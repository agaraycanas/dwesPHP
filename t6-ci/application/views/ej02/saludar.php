<?php if (isset ($nombre)): ?>
	<h1>HOLA <?= $nombre ?> <?=$apellido ?></h1>
<?php else:?>
	<h2>NO TE CONOZCO</h2>
<?php endif;?>