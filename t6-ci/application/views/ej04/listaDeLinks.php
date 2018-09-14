<h1>
LISTA de ENLACES FAVORITOS
</h1>

<ul>
<?php foreach ($links as $link): ?>
	<li>
	Ir a <?= anchor($link->url, $link->etiqueta) ?>
	</li>
<?php endforeach;?>
</ul>