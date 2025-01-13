<div class="container">
	<h1>Jornada número <?= $jornada ?></h1>
	
	<table class="table table-striped">
	<thead>
		<th>Equipos</th>
		<th>Resultado</th>
	</thead>
	
	<tbody>
	<?php foreach ($resultados as $resultado):?>
		<tr>
			<td>
				<?= $resultado -> fetchAs('equipo') -> local -> nombre ?> - <?= $resultado -> fetchAs('equipo') ->visitante -> nombre ?> 
			</td>
			
			<td>
				<?= $resultado->gl ?> - <?= $resultado->gv ?> 
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
	</table>
	
	<button onclick="window.location.href='<?=base_url()?>jornada/c';">Nueva</button>

</div>