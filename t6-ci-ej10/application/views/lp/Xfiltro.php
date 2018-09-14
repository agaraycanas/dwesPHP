<table class="table table-striped ">
<tr>
	<th>Nombre del lenguaje de programación</th>
	<th></th>
</tr>

<?php foreach ($body['lps'] as $lp): ?>
<tr>
	<td><?= $lp->nombre ?></td>
	<td>
		<form id="idForm" action="<?=base_url()?>
			<?php if ($body['accion']=='borrar'): ?>
			lp/borrarPost
			<?php elseif ($body['accion']=='modificar'): ?>
			lp/editar
			<?php endif;?>
			" method="post">
			<input type="hidden" name="id_lp" value="<?= $lp -> id?>">
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
