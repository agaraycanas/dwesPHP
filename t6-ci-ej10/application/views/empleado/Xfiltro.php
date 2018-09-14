<table class="table table-striped ">
<tr>
	<th>Nombre</th>
	<th>Apellido 1</th>
	<th>Apellido 2</th>
	<th></th>
</tr>

<?php foreach ($body['empleados'] as $empleado): ?>
<tr>
	<td><?= $empleado->nombre ?></td>
	<td><?= $empleado->ape1 ?></td>
	<td><?= $empleado->ape2 ?></td>
	<td>
		<form id="idForm" action="<?=base_url()?>
			<?php if ($body['accion']=='borrar'): ?>
			empleado/borrarPost
			<?php elseif ($body['accion']=='modificar'): ?>
			empleado/editar
			<?php endif;?>
			" method="post">
			<input type="hidden" name="id_empleado" value="<?= $empleado -> id?>">
			<input type="hidden" name="v" value="filtrar">
			<input type="hidden" name="filtro" value="<?=$body['filtro']?>">
			<?php if ($body['accion']=='borrar'): ?>
				<button onclick="function f() {document.getElementById('idForm').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
			<?php elseif ($body['accion']=='modificar'): ?>
				<button onclick="function f() {document.getElementById('idForm').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
			<?php endif;?>
		</form>
	</td>
</tr>
<?php endforeach;?>
</table>
