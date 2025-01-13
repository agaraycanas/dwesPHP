<div class="container">
	<h1>Nuevo país</h1>

	<form action="<?=base_url()?>pais/cPost" method="post">
		<label for="idNombre">Nombre</label> 
		<input id="idNombre" type="text" name="nombre" /> 
		<br /> 
		<input type="submit" />
	</form>
</div>