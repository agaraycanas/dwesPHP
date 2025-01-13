<div class="container">
	<h1>Lista de equipos</h1>
	
	<table class="table table-striped">
	<thead>
		<th>Nombre</th>
	</thead>
	<tbody>
	<?php foreach ($equipos as $equipo):?>
		<tr>
			<td>
				<?= $equipo->nombre ?>
			</td>
			
		</tr>
	<?php endforeach;?>
	</tbody>
	</table>
	
	<button onclick="window.location.href='<?=base_url()?>equipo/c';">Nuevo</button>

</div>