<div class="container">
	<h1>Lista de jornadas</h1>
	
	<table class="table table-striped">
	<thead>
		<th>Número</th>
		<th>Fecha de inicio</th>
		<th>Fecha de finalización</th>
		<th>Resultados</th>
	</thead>
	<tbody>
	<?php foreach ($jornadas as $jornada):?>
		<tr>
			<td>
				<?= $jornada->numero ?>
			</td>
			
			<td>
				<?= $jornada->ini ?>
			</td>
			
			<td>
				<?= $jornada->fin ?>
			</td>
			<td>
				<a href="<?=base_url()?>resultado/listar?j=<?= $jornada->numero?> ">Ver</a>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
	</table>
	
	<button onclick="window.location.href='<?=base_url()?>jornada/c';">Nueva</button>

</div>