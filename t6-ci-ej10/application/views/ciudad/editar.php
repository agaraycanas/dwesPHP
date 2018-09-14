<div class="container">
	<h3>Introduce los datos que quieras cambiar</h3>
	<form class="form" action="<?= base_url() ?>ciudad/editarPost" method="post">
		<label>Nombre</label>
		<input type="text" name="nombre" value="<?=$body['ciudad']->nombre ?> ">
		<input type="hidden" name="id_ciudad" value="<?=$body['ciudad']->id ?> ">
		<input type="submit"> 
	</form>
</div>
