<div class="container">
	<h2>Lista de empleados</h2>
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th>Primer apellido</th>
			<th>Segundo apellido</th>
			<th>Teléfono</th>
			<th>Ciudad de nacimiento</th>
			<th>Lenguajes de programación que conoce</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach ($body['empleados'] as $empleado): ?>
		<tr>
			<td><?= $empleado->nombre ?></td>
			<td><?= $empleado->ape1 ?></td>
			<td><?= $empleado->ape2 ?></td>
			<td><?= $empleado->tlf ?></td>
			<td><?= $empleado->ciudad->nombre ?></td>
			<td>
			<?php foreach ($empleado->sharedLpList as $lp): ?>
				<?= $lp->nombre ?> 
			<?php endforeach; ?>
			</td>
			<td>
				<form id="idFormedit" action="<?=base_url()?>empleado/editar" method="post">
					<input type="hidden" name="id_empleado" value="<?= $empleado -> id?>">
					<button onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<td>
				<form id="idFormRemove" action="<?=base_url()?>empleado/borrarPost" method="post">
					<input type="hidden" name="id_empleado" value="<?= $empleado -> id?>">
					<input type="hidden" name="v" value="listarTodos">
					<button onclick="function f() {document.getElementById('idFormRemove').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
				
			</td>
			
		</tr>
		<?php endforeach; ?>
	</table>
</div>