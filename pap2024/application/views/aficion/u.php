<div class="container">
	<h1>Editar afición</h1>

	<form action="<?=base_url()?>aficion/uPost" method="post">
		<label for="idNombre">Nombre</label> 
		<input id="idNombre" type="text" name="nombre" value="<?= $aficion->nombre ?>"/> 
		
		<input type="hidden" name="idAficion" value="<?= $aficion->id ?>" />
		
		<br /> 
		<input type="submit" />
	</form>
</div>