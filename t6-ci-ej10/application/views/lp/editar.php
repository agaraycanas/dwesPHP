<div class="container">
	<h3>Introduce los datos que quieras cambiar</h3>
	<form class="form" action="<?= base_url() ?>lp/editarPost" method="post">
		<label>Nombre</label>
		<input type="text" name="nombre" value="<?=$body['lp']->nombre ?> ">
		<input type="hidden" name="id_lp" value="<?=$body['lp']->id ?> ">
		<input type="hidden" name="v" value="<?=$body['v']?>">
		<input type="hidden" name="filtro" value="<?=$body['filtro']?>">
		<input type="submit"> 
	</form>
</div>
