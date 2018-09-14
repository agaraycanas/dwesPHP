<h3>Listado de departamentos</h3>
<table>
	<tr>
		<th>Nombre dpto.</th>
	</tr>
	<?php foreach ($departamentos as $departamento):?>
	<tr>
		<td><?=  $departamento->nombre ?></td>
	</tr>
	<?php endforeach;?>
</table>