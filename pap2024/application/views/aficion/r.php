<div class="container">
	<h1>Lista de aficiones</h1>
	<button onclick="window.location.href='<?=base_url()?>aficion/c';">
		Nueva</button>

	<table class="table table-striped">

		<thead>
			<th>Nombre</th>
		</thead>

		<tbody>
		
		<?php foreach ( $aficiones as $aficion ):?>
			<tr>
				<td>
					<?= $aficion->nombre ?>
				</td>
				<td>
					<form action="<?=base_url()?>aficion/u" method="get">
						<input type="hidden" name="idAficion" value="<?= $aficion->id ?>" />
						<button>
							<img onclick="submit()"
								src="<?=base_url()?>assets/img/icons/edit.png" height="30"
								width="30">
						</button>
					</form>
				</td>
				<td>
					<form action="<?=base_url()?>aficion/dPost" method="post">
						<input type="hidden" name="idAficion" value="<?= $aficion->id ?>" />
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