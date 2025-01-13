<div class="container">
	<h1>Lista de personas</h1>
	<button onclick="window.location.href='<?=base_url()?>persona/c';" > Nueva </button>

	<table class="table table-striped">

		<thead>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>País nacimiento</th>
			<th>País residencia</th>
			<th>Gustos</th>
			<th>Odios</th>
			<th>Editar</th>
			<th>Borrar</th>
		</thead>

		<tbody>
		
		<?php foreach ( $personas as $persona):?>
			<tr> 
				<td>
					<?= $persona->nombre ?>
				</td>
				<td>
					<?= $persona->apellido ?>
				</td>
				<td>
					<?= $persona->fetchAs('pais')->nace != null ? $persona->fetchAs('pais')->nace->nombre : '--' ?>
				</td>
				<td>
					<?= $persona->fetchAs('pais')->vive != null ? $persona->fetchAs('pais')->vive->nombre : '--' ?>
				</td>
				<td>
					<?php foreach ($persona->ownGustoList as $gusto):?>
						<?= $gusto->aficion->nombre ?> 
					<?php endforeach;?>
				</td>	
				<td>
					<?php foreach ($persona->ownOdioList as $odio):?>
						<?= $odio->aficion->nombre ?> 
					<?php endforeach;?>
				</td>
				<td>
					<form action="<?=base_url()?>persona/u" method="get">
						<input type="hidden" name="idPersona" value="<?= $persona->id ?>" />
						<button>
							<img onclick="submit()"
								src="<?=base_url()?>assets/img/icons/edit.png" height="30"
								width="30">
						</button>
					</form>
				</td>
				<td>
					<form action="<?=base_url()?>persona/dPost" method="post">
						<input type="hidden" name="idPersona" value="<?= $persona->id ?>" />
						<button>
							<img onclick="submit()"
								src="<?=base_url()?>assets/img/icons/trash.png" height="30"
								width="30">
						</button>
					</form>
				</td>		
			</tr>
		<?php endforeach; ?>
		</tbody>

	</table>
</div>