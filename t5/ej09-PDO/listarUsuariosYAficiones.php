<?php
// Éste es un ejercicio "extra"
require_once 'usuario_DAO.php';
require_once 'aficion_DAO.php';

$uDAO = new usuario_DAO();
$usuarios = $uDAO -> getTodos();
$usuariosEmpaquetados = [];
$aDAO = new aficion_DAO();

foreach ($usuarios as $usuario) {
	$usuariosEmpaquetados[$usuario['nombre']] = [];
	$aficiones = $aDAO -> getByIdUsuario($usuario['id']);
	foreach ($aficiones as $aficion) {
		array_push($usuariosEmpaquetados[$usuario['nombre']], $aficion['nombre'] );
	}
}
?>

<table border="1">
	<tr>
		<th>Nombre</th><th>Aficiones</th>
	</tr>
	<?php foreach ($usuariosEmpaquetados as $nombre => $aficiones) :?>
		<tr>
			<td><?= $nombre ?></td>
			<td>
			<?php foreach ($aficiones as $aficion) :?>
				<?= $aficion ?>, 
			<?php endforeach;?>
			</td>
		</tr>
	<?php endforeach;?>
</table>