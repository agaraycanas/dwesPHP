<?php
session_start();
require_once '../ej01/helper.php';
?>

<h1>Lista de verbos</h1>
<table border="1">

	<thead>
		<th>Infinitivo</th>
		<th>Conjugación</th>
		<th>Presente de indicativo</th>
	</thead>

<?php foreach ($_SESSION['infinitivos'] as $infinitivo): ?>
	<tr>
		<td><?=$infinitivo ?></td>
		<td><?= num_conjugacion($infinitivo) ?></td>
		<td><?= conjugar($infinitivo) ?></td>
	</tr>
<?php endforeach;?>

</table>

<form action="uno.php">
	<input type="submit" value="Volver a introducir verbos" />
</form>