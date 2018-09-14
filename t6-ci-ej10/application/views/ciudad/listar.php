<div class="container">
<table class="table table-striped">
	<tr><th>Nombre ciudad</th> <th></th> <th></th> </tr>
	<?php foreach ($body['ciudades'] as $ciudad): ?>
		<tr>
			<td>
				<?= $ciudad['nombre']?>
			</td>
			
			<td>
				<form id="idFormedit" action="<?=base_url()?>ciudad/editar" method="post">
					<input type="hidden" name="id_ciudad" value="<?= $ciudad -> id?>">
					<button onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			
			<td>
				<form id="idFormRemove" action="<?=base_url()?>ciudad/borrarPost" method="post">
					<input type="hidden" name="id_ciudad" value="<?= $ciudad -> id?>">
					<input type="hidden" name="v" value="listarTodos">
					<button onclick="function f() {document.getElementById('idFormRemove').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
				
			</td>
		</tr>
	<?php endforeach;?>
</table>
</div>