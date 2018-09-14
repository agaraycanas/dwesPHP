<?php
// Éste es un ejercicio "extra"
require_once 'usuario_DAO.php';
require_once 'aficion_DAO.php';

$uDAO = new usuario_DAO();
$usuarios = $uDAO -> getTodos();

?>

<table border="1">
	<tr>
		<th>Nombre</th><th>Aficiones</th>
	</tr>
	<?php foreach ($usuarios as $usuario) :?>
		<tr>
			<td><?= $usuario -> nombre ?></td>
			<td>
			<?php foreach ($usuario -> sharedAficionList as $aficion) :?>
				<?= $aficion -> nombre ?>, 
			<?php endforeach;?>
			</td>
		</tr>
	<?php endforeach;?>
</table>