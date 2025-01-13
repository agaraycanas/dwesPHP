<div class="container">
	<h1>Lista de países</h1>
	
	<table class="table table-striped">
	<thead>
		<th>Nombre</th>
		<th>Editar</th>
		<th>Borrar</th>
	</thead>
	<tbody>
	<?php foreach ($ps as $pais):?>
		<tr>
			<td>
				<?= $pais->nombre ?>
			</td>
			<td>
				<form action="<?=base_url()?>pais/u" method="get" >
					<input type="hidden" name="idPais" value="<?= $pais->id ?>"/>
					<button>
						<img onclick="submit()" src="<?=base_url()?>assets/img/icons/edit.png" height="30" width="30">
					</button>
				</form>
			</td>
			<td>
				<form action="<?=base_url()?>pais/dPost" method="post" >
					<input type="hidden" name="idPais" value="<?= $pais->id ?>"/>
					<button>
						<img onclick="submit()" src="<?=base_url()?>assets/img/icons/trash.png" height="30" width="30">
					</button>
				</form>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
	</table>
	
	<button onclick="window.location.href='<?=base_url()?>pais/c';">Nuevo</button>

</div>