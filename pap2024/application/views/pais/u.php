<div class="container">
	<h1>Editar país</h1>

	<form action="<?=base_url()?>pais/uPost" method="post">
		<label for="idNombre">Nombre</label> 
		<input id="idNombre" type="text" name="nombre" value="<?= $pais->nombre ?>"/> 
		
		<input type="hidden" name="idPais" value="<?= $pais->id ?>" />
		
		<br /> 
		<input type="submit" />
	</form>
</div>