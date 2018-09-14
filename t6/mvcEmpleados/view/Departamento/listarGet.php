<h1>Lista de departamentos</h1>
<table>
	<tr>
		<th>Nombre dpto.</th>
	</tr>
		<?php foreach ($d['mainView'] as $dpto):?>
		<tr>
		<td>		
				<?= $dpto['nombre']?>
			</td>
	</tr>
		<?php endforeach;?>
	</table>

