<div class="container">
<table class="table table-striped">
	<tr><th>Nombre del L.P.</th> <th></th> <th></th> </tr>
	<?php foreach ($body['lps'] as $lp): ?>
		<tr>
			<td>
				<?= $lp['nombre']?>
			</td>
			
			<td>
				<form id="idFormedit" action="<?=base_url()?>lp/editar" method="post">
					<input type="hidden" name="id_lp" value="<?= $lp -> id?>">
					<button onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			
			<td>
				<form id="idFormRemove" action="<?=base_url()?>lp/borrarPost" method="post">
					<input type="hidden" name="id_lp" value="<?= $lp -> id?>">
					<input type="hidden" name="v" value="listarTodos">
					<button onclick="function f() {document.getElementById('idFormRemove').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
				
			</td>
		
		</tr>
	<?php endforeach;?>
</table>
</div>