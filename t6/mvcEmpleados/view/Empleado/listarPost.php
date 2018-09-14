<table>
	<tr>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Fecha nac.</th>
		<th>Departamento</th>
	</tr>
	<?php foreach ($d['mainView']['listaEmpleados'] as $empleado): ?>
	<tr>
		<td><?= $empleado['nomemp'] ?></td>
		<td><?= $empleado['apellido'] ?></td>
		<td><?= $empleado['fnac'] ?></td>
		<td><?= $empleado['nomdep'] ?></td>
	</tr>
	<?php endforeach;?>
</table>